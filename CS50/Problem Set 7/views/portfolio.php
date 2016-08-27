<div>
    <!--<iframe allowfullscreen frameborder="0" height="315" src="https://www.youtube.com/embed/oHg5SJYRHA0?autoplay=1&iv_load_policy=3&rel=0" width="420"></iframe>-->
    
    <table class=" table table-condensed">
      <thead>
          <td>Symbol</td>
          <td>Shares</td>
          <td>Current Price</td>
      </thead>
      <tbody>
      <?php
          foreach ($positions as $position)
          {
              if ($position["shares"]>0)
              {
                  print("<tr>");
                  print("<td>{$position["symbol"]}</td>");
                  print("<td>{$position["shares"]}</td>");
                  print("<td>{$position["price"]}</td>");
                  print("</tr>");
              }
              if($position["shares"]==0)
              {
                  unset($position);
              }
          }
      ?>
     </tbody>
    </table>
    <?php $rows = cs50::query("SELECT * FROM users WHERE id = ?", $_SESSION["id"]); ?>
    <p>You have $<?=$rows[0]["cash"] ?> to spend! </p>
    <div id="logout">
        <a href='changepwd.php'>Change Password</a> &nbsp; <a href="logout.php">Log Out</a>
    </div>

</div>
