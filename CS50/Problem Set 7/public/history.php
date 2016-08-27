<?php
    require("../includes/config.php");
    $rows=cs50::query("SELECT * FROM history WHERE id= ?", $_SESSION["id"]);
    $positions = [];
    foreach ($rows as $row)
    {
        if ($row !== false)
        {
            $positions[] = [
                "date" => $row["date"],
                "buy_shares" => $row ["bshares"],
                "buy_quantity" => $row ["bquantity"],
                "sell_shares" => $row ["sshares"],
                "sell_quantity" => $row ["squantity"],
            ];
        }
    }
    render("history_final.php",  ["positions" =>$positions, "title" => "history"]); 
?>