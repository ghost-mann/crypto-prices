<?php

$api_key = "CG-HTva4gAZt2xJMhZT6iNqpB6C";

$coins = 'bitcoin,ethereum,solana,dogecoin,monero';
$vs_currency = 'usd';

$url = "https://api.coingecko.com/api/v3/simple/price?ids={$coins}&vs_currencies={$vs_currency}&include_24hr_change=true&x_cg_demo_api_key={$api_key}";

$json = file_get_contents($url);
$data = json_decode($json);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles.css">
    <title>Crypto Prices</title>
</head>
<body>
    <div class="container">
        <h1>Latest Crypto Prices</h1>
        <table>
            <tr>
                <th>COIN</th>
                <th>PRICE(USD)</th>
                <th>24H CHANGE</th>
            </tr>

            <?php
            foreach ($data as $coin => $info) {
                echo "<tr>";
                echo "<td>" . $coin ."</td>";
                echo "<td>" . $info->usd . "</td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>
<footer>Made by ghost-mann.Powered by CoinGecko.</footer>
</body>
</html>
