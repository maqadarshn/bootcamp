<?php

    require(__DIR__ . "/../includes/config.php");

    // numerically indexed array of places
    $places = [];

    // TODO: search database for places matching $_GET["geo"], store in $places
    $geo = $_GET["geo"];
    $geo = str_replace(",", " ", $geo);
    $geo= preg_replace('/\s+/', ' ', $geo);
    $geo = explode(" ", $geo);
    $count = count($geo);
    if ($count < 1){
    	print("Please provide an input.");
    }
    elseif ($count === 1){
    	$geo = $geo[0];
    	if(strlen($geo) == 5){
    		$places = cs50::query("SELECT * FROM places WHERE postal_code = ?", $geo);
    	}
    	elseif(strlen($geo) == 2){
    		$places = cs50::query("SELECT * FROM places WHERE admin_code1 = ?", strtoupper($geo));
    	}
    	else{
    		$places = cs50::query("SELECT * FROM places WHERE place_name LIKE ?", $geo);
    	}

    }
    else{
        $geo = implode(" ", $geo);
        $places = cs50::query("SELECT * FROM places WHERE MATCH(postal_code, place_name) AGAINST (?)", $geo);
    }
    // output places as JSON (pretty-printed for debugging convenience)
    header("Content-type: application/json");
    print(json_encode($places, JSON_PRETTY_PRINT));

?>