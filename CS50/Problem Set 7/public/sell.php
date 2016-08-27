<?php
 require("../includes/config.php");
 if ($_SERVER["REQUEST_METHOD"] == "GET") {
    render("../views/sell_request.php");
 }
 else {
    $stock=lookup($_POST["symbol"]);
    if ($stock==false){
        apologize("Invalid symbol");
    }
    $rows = cs50::query("SELECT * FROM portfolios WHERE id = ? AND symbol=?", $_SESSION["id"], strtoupper($_POST["symbol"]));
    if(count($rows)==0) {
        apologize ("You do not own this stock");
    }

    else {
        if($_POST["shares"]>$rows[0]["shares"]) {
            apologize ("You do not have enough stock");
            echo($rows[0]["shares"]);
        }
        $stocks= ($_POST["shares"])*($stock["price"]);
        $row=cs50::query("UPDATE portfolios SET shares=shares-? WHERE id=? AND symbol=?", $_POST["shares"],  $_SESSION["id"], strtoupper($_POST["symbol"]));
        $row=cs50::query("UPDATE users SET cash=cash+? WHERE id = ?", $stocks, $_SESSION["id"]);
        $history = cs50::query("SELECT * FROM history WHERE id = ?", $_SESSION["id"]);
        $history=cs50::query("INSERT INTO history (id, sell_shares, sell_quantity) VALUES(?, ?,?)", $_SESSION["id"], strtoupper($_POST["symbol"]),  $_POST["shares"]);
        render ("sell_msg.php", ["symbol" => $stock ["symbol"],"shares" => $_POST["shares"], ]);
    }
  }

 ?>
