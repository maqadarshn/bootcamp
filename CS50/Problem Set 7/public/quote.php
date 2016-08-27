<?php
    require("../includes/config.php"); 
    if($_SERVER["REQUEST_METHOD"]== "GET") {
        render("quote_form.php");
    }
    else {
        $stock=lookup($_POST["symbol"]);
        if ($stock === false) {
            apologize ("Please input correct Stock Quote");
        }
        render ("quote_price.php", ["symbol" => $stock ["symbol"],"price" => $stock["price"]]);
    }
?>