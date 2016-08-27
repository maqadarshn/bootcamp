<table class="table table-condensed">
    <thead>
        <th>Date & Time</th>
        <th>Stocks Purchased</th>
        <th>Number of Shares</th>
        <th>Stocks Sold</th>
        <th>Number of Shares</th>
    </thead>
    <tbody>

    <?php
        foreach ($positions as $position){
            print("<tr>");  
            print("<td>{$position["date"]}</td>");
            if($position["buy_quantity"]>0){
                print("<td>{$position["buy_shares"]}</td>");
                print("<td>{$position["buy_quantity"]}</td>");
                print("<td></td>");
                print("<td></td>");
            }
            if($position["sell_quantity"]>0){
                print("<td></td>");
                print("<td></td>");
                print("<td>{$position["sell_shares"]}</td>");
                print("<td>{$position["sell_quantity"]}</td>");
            }
            print("</tr>");                                                
         
        }
    ?>

    </tbody> 
</table> 