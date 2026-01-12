<?php
$api_key = "CG-HTva4gAZt2xJMhZT6iNqpB6C";
$coins = "bitcoin,solana,ethereum,dogecoin,monero";
$vs_currency = 'usd';

$url = "https://api.coingecko.com/api/v3/simple/price?ids={$coins}&vs_currencies={$vs_currency}&include_24hr_change=true&x_cg_demo_api_key={$api_key}";

$json = file_get_contents($url);
$data = json_decode($json);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cryptocurrency Prices</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<h1>Latest Cryptocurrency Prices</h1>
<table>
    <thead>
    <tr>
        <th>COIN</th>
        <th>Price(USD)</th>
    </tr>
    </thead>
    <tbody>
    <?php
    if ($data === null) {
        echo "Could not retrieve crypto data";
    } else {
        foreach ($data as $coin => $stuff) {
            echo "<tr>";
            echo "<td> $coin </td>";
            echo "<td> $stuff->usd </td>";
            echo "</tr>";
        }

    }
    ?>
    </tbody>

</table>
</body>

</html>
