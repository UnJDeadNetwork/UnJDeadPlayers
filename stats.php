<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
	<link rel="icon" href="https://www.unjdead.network/favicon.ico" type="image/png" />
    <title>UnJDead.Network <?php
    if(isset($_GET["name"])){
      echo "Stats for ".$_GET["name"];
    } else {
      echo "No Stats requested";
    }
    ?></title>
  </head>
  <link rel="stylesheet" href="assets/css/main.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
  <body>
	<div id="center">
      <?php
      if(isset($_GET["player"]) && isset($_GET["name"])){
        include('database.php');
        include('assets/includes/StatsManager.php');
        $uuid = mysqli_real_escape_string($mysqli, $_GET["player"]);
        $name = $_GET["name"];
        $kd = (int) getKills($uuid) / (int) getDeaths($uuid);
        echo '<h1>Stats for '.filter_var($name, FILTER_SANITIZE_STRIPPED).'</h1>
        <h3 id="box"><i class="material-icons">accessibility</i>&nbsp;Kills: '.getKills($uuid).'</h3>
        <h3 id="box"><i class="material-icons">local_hospital</i>&nbsp;Deaths: '.getDeaths($uuid).'</h3>
        <h3 id="box"><i class="material-icons">favorite</i>&nbsp;K/D: '.round($kd, 1).'</h3>
        <h3 id="box"><i class="material-icons">alarm</i>&nbsp;Last join:<br> '.getLastJoinDate($uuid).'<br></h3>
        <h3 id="box"><i class="material-icons">account_circle</i>&nbsp;First join:<br> '.getFirstJoinDate($uuid).'<br></h3>
		<h3 id="box">All times are shown AEST &#40;Australia/Sydney&#41;</h3><br>';
      } else {
        echo '<h1 style="color: red;">No stats were requested.<br>Please search again below.</h1>';
      }
       ?>
	   
	   <form action="index.php" method="post">
        <input type="text" name="name" placeholder="Search another player?">
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
