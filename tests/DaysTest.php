<?php


class DaysTest extends TestCase
{
    const endpoint = '/api/days';

    /**
     * Test an ideal request of the api. Perfectly valid ISO 8601 datetime strings.
     *
     * @return void
     */
    public function testCorrectRequest()
    {
        $this->json('POST', self::endpoint, ['start' => '2020-11-06T01:00:00+00:00', 'end' => '2020-11-06T01:00:00+00:00'])
            ->seeJsonContains([
                0
            ])
           ->assertResponseOk();

        // Changing some values
        $this->json('POST', self::endpoint, ['start' => '2020-11-03T01:00:00+00:00', 'end' => '2020-11-06T01:00:00+00:00'])
            ->seeJsonContains([
                3
            ])
            ->assertResponseOk();

        // Reversing start and end should still return the absolute difference in days
        $this->json('POST', self::endpoint, ['start' => '2020-11-06T01:00:00+00:00', 'end' => '2020-11-03T01:00:00+00:00'])
            ->seeJsonContains([
                3
            ])
            ->assertResponseOk();

        // Timezone values, they are both 6th of november, but more than 24 hours apart
        $this->json('POST', self::endpoint, ['start' => '2020-11-06T01:00:00-11:00', 'end' => '2020-11-06T01:00:00+14:00'])
            ->seeJsonContains([
                1
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
        $this->json('POST', self::endpoint, ['start' => '2020-11-09T01:00:00+00:00', 'end' => '2020-11-10T01:00:00+00:00', 'format' => 'h'])
            ->seeJsonContains([
                24
            ])
            ->assertResponseOk();

        $this->json('POST', self::endpoint, ['start' => '2020-11-09T01:00:00+00:00', 'end' => '2020-11-10T01:00:00+00:00', 'format' => 'm'])
            ->seeJsonContains([
                1440
            ])
            ->assertResponseOk();

        $this->json('POST', self::endpoint, ['start' => '2020-11-09T01:00:00+00:00', 'end' => '2020-11-10T01:00:00+00:00', 'format' => 's'])
            ->seeJsonContains([
                86400
            ])
            ->assertResponseOk();

        $this->json('POST', self::endpoint, ['start' => '2020-11-09T01:00:00+00:00', 'end' => '2020-11-10T01:00:00+00:00', 'format' => 'y'])
            ->seeJsonContains([
                0.0027397260273972603
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
            'start' => '2020-11-09T01:00:00+00:00',
            'end' => '2020-11-10T01:00:00+00:00',
            'format' => 'd'
        ])
            ->seeJsonContains([
                'format' => ['The selected format is invalid.']
            ])
            ->assertResponseStatus(422);

        $this->json('POST', self::endpoint, [
            'start' => '2020-11-09T01:00:00+00:00',
            'end' => '2020-11-10T01:00:00+00:00',
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
            'start' => '2020-11-09',
            'end' => '2020-11-10T01:00:00',
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
            'start' => 'oh hi mark',
            'end' => '😁 what are you doing?',
            'format' => null
        ])
            ->seeJsonContains([
                'start' => ['The start does not match the format Y-m-d\\TH:i:sP.'],
                'end' => ['The end does not match the format Y-m-d\\TH:i:sP.'],
            ])
            ->seeJsonDoesntContains([
                'format' =>  ['The selected format is invalid.']
            ])
            ->assertResponseStatus(422);
    }
}
