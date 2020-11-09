<?php


class WeeksTest extends TestCase
{
    const endpoint = '/api/weeks';

    /**
     * Test an ideal request of the api. Perfectly valid ISO 8601 datetime strings.
     *
     * @return void
     */
    public function testCorrectRequest()
    {
        $this->json('POST', self::endpoint, ['start' => '2020-01-01T01:00:00+00:00', 'end' => '2020-12-31T01:00:00+00:00'])
            ->seeJsonContains([
                52
            ])
            ->assertResponseOk();

        // 2 years apart
        $this->json('POST', self::endpoint, ['start' => '2019-01-01T01:00:00+00:00', 'end' => '2020-12-31T01:00:00+00:00'])
            ->seeJsonContains([
                104
            ])
            ->assertResponseOk();

        // Reversing start and end should still return the absolute difference in weeks
        $this->json('POST', self::endpoint, ['start' => '2020-12-31T01:00:00+00:00', 'end' => '2019-01-01T01:00:00+00:00'])
            ->seeJsonContains([
                104
            ])
            ->assertResponseOk();
    }

    /**
     * Same as above case. Added option to convert into accepted formats.
     *
     * @return void
     */
    public function testCorrectRequestWithFormat()
    {
        $this->json('POST', self::endpoint, ['start' => '2020-01-01T01:00:00+00:00', 'end' => '2020-01-08T01:00:00+00:00', 'format' => 'h'])
            ->seeJsonContains([
                168
            ])
            ->assertResponseOk();

        $this->json('POST', self::endpoint, ['start' => '2020-01-01T01:00:00+00:00', 'end' => '2020-01-08T01:00:00+00:00', 'format' => 'm'])
            ->seeJsonContains([
                10080
            ])
            ->assertResponseOk();

        $this->json('POST', self::endpoint, ['start' => '2020-01-01T01:00:00+00:00', 'end' => '2020-01-08T01:00:00+00:00', 'format' => 's'])
            ->seeJsonContains([
                604800
            ])
            ->assertResponseOk();

        $this->json('POST', self::endpoint, ['start' => '2020-01-01T01:00:00+00:00', 'end' => '2020-01-08T01:00:00+00:00', 'format' => 'y'])
            ->seeJsonContains([
                0.019178082191780823
            ])
            ->assertResponseOk();
    }

    /**
     * Correct datetime parameters. Wrong format input; format not one of the accepted values.
     *
     * @return void
     */
    public function testCorrectRequestInvalidFormat()
    {
        $this->json('POST', self::endpoint, [
            'start' => '2020-01-01T01:00:00+00:00',
            'end' => '2020-01-08T01:00:00+00:00',
            'format' => 'd'
        ])
            ->seeJsonContains([
                'format' => ['The selected format is invalid.']
            ])
            ->assertResponseStatus(422);

        $this->json('POST', self::endpoint, [
            'start' => '2020-01-01T01:00:00+00:00',
            'end' => '2020-01-08T01:00:00+00:00',
            'format' => 'REALLY WRONG INPUT FORMAT'
        ])
            ->seeJsonContains([
                'format' => ['The selected format is invalid.']
            ])
            ->assertResponseStatus(422);
    }

    /**
     * Valid and parsable datetime strings. But datetime strings does not conform to ISO 8601 standards.
     *
     * @return void
     */
    public function testIncorrectDateFormat()
    {
        $this->json('POST', self::endpoint, [
            'start' => '2020-01-01T01:00:00',
            'end' => '2020-01-08',
        ])
            ->seeJsonContains([
                'start' => ['The start does not match the format Y-m-d\\TH:i:sP.'],
                'end' => ['The end does not match the format Y-m-d\\TH:i:sP.']
            ])
            ->assertResponseStatus(422);
    }

    /**
     * Test random inputs
     *
     * Emojis, not anything even remotely related to datetime strings in any format and what not.
     *
     * @note Technically 'format' can be null and is not part of the accepted values, but it should not complain that
     * it is an invalid input
     */
    public function testRandomInput()
    {
        $this->json('POST', self::endpoint, [
            'start' => 'just making sure',
            'end' => 'this is definitely not a datetime string ☺',
            'format' => null
        ])
            ->seeJsonContains([
                'start' => ['The start does not match the format Y-m-d\\TH:i:sP.'],
                'end' => ['The end does not match the format Y-m-d\\TH:i:sP.'],
            ])
            ->seeJsonDoesntContains([
                'format' => ['The selected format is invalid.']
            ])
            ->assertResponseStatus(422);
    }
}
