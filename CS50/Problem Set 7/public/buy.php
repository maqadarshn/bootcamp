<?php
    require("../includes/config.php");
    if($_SERVER["REQUEST_METHOD"]=="GET") {
        render("buy_request.php");
    }
    else {
        $rows = cs50::query("SELECT * FROM users WHERE id = ?", $_SESSION["id"]); 
        $stock=lookup($_POST["symbol"]);
        if($stock==false) {
            apologize ("Invalid stock symbol");
        }
        if (preg_match("/^\d+$/",$_POST["shares"]) == false) { 
            apologize("Only positive, whole number are allowed");
        }
        if((($stock["price"])*($_POST["shares"])) < ($rows[0]["cash"])) {
            $row = cs50::query("SELECT * FROM portfolios WHERE id = ?", $_SESSION["id"]); 
            $row=cs50::query("INSERT INTO portfolios (id, symbol, shares) VALUES(?,?,?) ON DUPLICATE KEY UPDATE shares=shares+ VALUES(shares)", $_SESSION["id"], strtoupper($_POST["symbol"]), $_POST["shares"]);
            $history = cs50::query("SELECT * FROM history WHERE id = ?", $_SESSION["id"]);
            $history=cs50::query("INSERT INTO history (id, buy_shares, buy_quantity) VALUES(?, ?,?)", $_SESSION["id"], strtoupper($_POST["symbol"]), $_POST["shares"]);
            $price=(($stock["price"])*($_POST["shares"]));
            $rows=cs50::query("UPDATE users SET cash = cash-?", $price);
            render("buy_msg.php", ["shares"=> $_POST["shares"], "symbol"=>strtoupper($_POST["symbol"])]);
        }
        else {
            apologize("Invalid number");
        }
    }
?>