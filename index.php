<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
	<link rel="icon" href="https://www.unjdead.network/favicon.ico" type="image/png" />
    <title>UnJDead.NetWork Player Stats</title>
  </head>
  <link rel="stylesheet" href="assets/css/main.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
  <body>
    <div id="center">
      <h1>UnJDead.NetWork Player Stats</h1><br>
      <p>On this page you can view stats from you or other players.
	  <br>This will inculd their kills and deaths.</p><br>
      <?php
      if(isset($_POST["submit"])){
        include('database.php');
        include('assets/includes/StatsManager.php');
        $name = mysqli_real_escape_string($mysqli, $_POST["name"]);
        $uuid = getUUID($name);
        if(isPlayerExists($uuid)){
          header("Location: stats.php?player=".$uuid."&name=".$name);
          exit;
        } else {
          echo '<p style="color: red;">There are no statistics for this player</p>';
        }
      }
       ?>
      <form action="index.php" method="post">
        <input type="text" name="name" placeholder="Enter a playername...">
        <button type="submit" name="submit"><i class="material-icons">search</i></button>
      </form>
    </div>
    <footer>
	<p style="color: black;">
				&copy; Copyright 2018. All Rights Reserved. UnJDeadNetwork</small>
				<br>
				REGISTERED UNDER ABN: 44 390 916 191
	</p>
	</footer>
  </body>
</html>
