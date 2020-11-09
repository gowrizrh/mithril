<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Title</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="raster2.css">
    <style>
        :root {
            --fontSize: 16px;
        }

        a {
            display: block;
        }

        body {
            background-image: url("/background.svg");
            background-repeat: no-repeat;
            background-size: contain;
        }
    </style>
</head>
<body>
<h1>Mithril API</h1>
<r-grid columns="2" columns-s="1">
    <r-cell>
        <p>Minimal and straight-forward API to calculate difference between days.</p>

        <h3>Overview</h3>
        <a href="#days">Days</a>
        <a href="#weekdays">Weekdays</a>
        <a href="#weeks">Weeks</a>
    </r-cell>
</r-grid>
<r-grid columns="1">
    <r-cell>
        <a id="days"></a>
        <h2>Days</h2>
        <pre>POST /api/days</pre>
        <p>Find out the number of days between two datetime parameters.</p>
        <h6>Parameters</h6>
        <table>
            <thead>
                <tr>
                    <th>Parameter</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>start</td>
                    <td>
                        <p>An ISO 8601 datetime string.</p>
                        <p>Example: 2020-12-19T01:00:00+00:00</p>
                    </td>
                </tr>
                <tr>
                    <td>end</td>
                    <td>
                        <p>An ISO 8601 datetime string.</p>
                        <p>Example: 2020-12-19T01:00:00+00:00</p>
                    </td>
                </tr>
                <tr>
                    <td>format</td>
                    <td>Optional. Accepts one value of s,m,h,y</td>
                </tr>
            </tbody>
        </table>
    </r-cell>
</r-grid>

<r-grid columns="1">
    <r-cell>
        <a id="weekdays"></a>
        <h2>Weekdays</h2>
        <pre>POST /api/weekdays</pre>
        <p>Find out the number of weekdays between two datetime parameters</p>

        <h6>Parameters</h6>
        <table>
            <thead>
            <tr>
                <th>Parameter</th>
                <th>Description</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>start</td>
                <td>
                    <p>An ISO 8601 datetime string.</p>
                    <p>Example: 2020-12-19T01:00:00+00:00</p>
                </td>
            </tr>
            <tr>
                <td>end</td>
                <td>
                    <p>An ISO 8601 datetime string.</p>
                    <p>Example: 2020-12-19T01:00:00+00:00</p>
                </td>
            </tr>
            <tr>
                <td>format</td>
                <td>Optional. Accepts one value of s,m,h,y</td>
            </tr>
            </tbody>
        </table>

    </r-cell>
</r-grid>

<r-grid columns="1">
    <r-cell>
        <a id="weeks"></a>
        <h2>Weeks</h2>

        <pre>POST /api/weeks</pre>
        <p>Find out the number of complete weeks between two datetime parameters</p>

        <h6>Parameters</h6>
        <table>
            <thead>
            <tr>
                <th>Parameter</th>
                <th>Description</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>start</td>
                <td>
                    <p>An ISO 8601 datetime string.</p>
                    <p>Example: 2020-12-19T01:00:00+00:00</p>
                </td>
            </tr>
            <tr>
                <td>end</td>
                <td>
                    <p>An ISO 8601 datetime string.</p>
                    <p>Example: 2020-12-19T01:00:00+00:00</p>
                </td>
            </tr>
            <tr>
                <td>format</td>
                <td>Optional. Accepts one value of s,m,h,y</td>
            </tr>
            </tbody>
        </table>

    </r-cell>
</r-grid>
</body>
</html>
