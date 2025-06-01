<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Connection Check Example</title>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <style>
        body {
            font-family: "Courier New", serif;
            font-size: 26px;
        }

        table {
            border-collapse: collapse;
        }

        td {
            padding: 10px;
        }
    </style>
</head>
<body>
<h2>Provider Check:</h2>
<pre id="statusIpCheck">Loading...</pre>
<table>
    <tr>
        <td style="font-weight: bold">IP:</td>
        <td id="ip"></td>
    </tr>
    <tr>
        <td style="font-weight: bold">ISP:</td>
        <td id="isp"></td>
    </tr>
</table>

<h2>Speed Check:</h2>
<pre id="statusSpeedCheck">Loading...</pre>
<table>
    <tr>
        <td style="font-weight: bold">transport speed:</td>
        <td style="text-align: right" id="transportSpeed"></td>
    </tr>
    <tr>
        <td style="font-weight: bold">server speed:</td>
        <td style="text-align: right" id="serverSpeed"></td>
    </tr>
</table>

<script>

    // speed check

    const urlSpeedCheck = 'speedcheck.php';
    const start = performance.now();

    axios.get(urlSpeedCheck)
        .then(response => {

            const end = performance.now();

            document.getElementById('transportSpeed').textContent = (end - start - response.data.transactionDuration).toFixed(2) + " ms";
            document.getElementById('serverSpeed').textContent = response.data.transactionDuration.toFixed(2) + " ms";
            document.getElementById('statusSpeedCheck').textContent = 'Success';
        })
        .catch(error => {
            document.getElementById('statusSpeedCheck').textContent = 'Error: ' + error;
        });

    // ip/isp check

    const urlIpCheck = 'ipcheck.php';

    axios.get(urlIpCheck)
        .then(response => {
            document.getElementById('ip').textContent = response.data.query;
            document.getElementById('isp').textContent = response.data.isp;
            document.getElementById('statusIpCheck').textContent = 'Success';
        })
        .catch(error => {
            document.getElementById('statusIpCheck').textContent = 'Error: ' + error;
        });

</script>
</body>
</html>