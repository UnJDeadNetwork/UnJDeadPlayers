<?php
date_default_timezone_set("Australia/Sydney");
function getUUID($name){
  include("MinecraftUUID.php");
  $profile = ProfileUtils::getProfile($name);

  if ($profile != null) {
    $result = $profile->getProfileAsArray();
    return ProfileUtils::formatUUID($result['uuid']);
  }
}
function isPlayerExists($uuid){
  include('database.php');
  $abfrage = "SELECT UUID FROM stats WHERE UUID = '$uuid'";
  $ergebnis = mysqli_query($mysqli,$abfrage) or die(mysqli_error($mysqli));
  $data = 0;
  while($row = mysqli_fetch_object($ergebnis)){
    $data++;
  }
  if($data == 0){
    return false;
  } else {
    return true;
  }
}
function getKills($uuid){
  include('database.php');
  $abfrage = "SELECT KILLS FROM stats WHERE UUID = '$uuid'";
  $ergebnis = mysqli_query($mysqli,$abfrage) or die(mysqli_error($mysqli));
  while($row = mysqli_fetch_array($ergebnis)){
    return $row["KILLS"];
  }
}
function getDeaths($uuid){
  include('database.php');
  $abfrage = "SELECT DEATHS FROM stats WHERE UUID = '$uuid'";
  $ergebnis = mysqli_query($mysqli,$abfrage) or die(mysqli_error($mysqli));
  while($row = mysqli_fetch_array($ergebnis)){
    return $row["DEATHS"];
  }
}
function getFirstJoinDate($uuid){
  include('database.php');
  $abfrage = "SELECT FIRSTJOIN FROM stats WHERE UUID = '$uuid'";
  $ergebnis = mysqli_query($mysqli,$abfrage) or die(mysqli_error($mysqli));
  while($row = mysqli_fetch_array($ergebnis)){
    $mil = $row["FIRSTJOIN"];
    $seconds = $mil / 1000;
    return date("d/m/Y h:ia", $seconds);
  }
}
function getLastJoinDate($uuid){
  include('database.php');
  $abfrage = "SELECT LASTJOIN FROM stats WHERE UUID = '$uuid'";
  $ergebnis = mysqli_query($mysqli,$abfrage) or die(mysqli_error($mysqli));
  while($row = mysqli_fetch_array($ergebnis)){
    $mil = $row["LASTJOIN"];
    $seconds = $mil / 1000;
    return date("d/m/Y h:ia", $seconds);
  }
}
function getPlayerID($uuid){
  include('database.php');
  $abfrage = "SELECT ID FROM stats WHERE UUID = '$uuid'";
  $ergebnis = mysqli_query($mysqli,$abfrage) or die(mysqli_error($mysqli));
  while($row = mysqli_fetch_array($ergebnis)){
    return $row["ID"];
  }
}
 ?>
