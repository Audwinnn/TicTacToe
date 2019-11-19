<?php
  if (isset ($_POST['submit'])) {

  $hostname = "localhost";
  $surename = "root";
  $password = "";
  $database = "tictactoe";

  $conn = mysqli_connect($hostname, $surename, $password, $database);

  $win = mysqli_real_escape_string($conn, $_POST['win']);
  $lose = mysqli_real_escape_string($conn, $_POST['lose']);
  $draw = mysqli_real_escape_string($conn, $_POST['draw']);

if ($win == 1){
  $sql = "UPDATE `record` SET `win`= `win`+ 1 WHERE `id` = 1";
  $result = mysqli_query($conn, $sql);
  if ($lose == 0){
    $sql = "UPDATE `record` SET `lose`= `lose` + 1 WHERE `id` = 2";
    mysqli_query($conn, $sql);
    header("Location: index.php?save=success");
    exit();
  }
} else if ($lose == 1) {
  $sql = "UPDATE `record` SET `lose` = `lose` + 1 WHERE `id` = 1";
  mysqli_query($conn, $sql);
  if ($win == 0){
    $sql = "UPDATE `record` SET `win` = `win` + 1 WHERE `id` = 2";
    mysqli_query($conn, $sql);
    header("Location: index.php?save=successs");
    exit();
  }
} else if ($draw == 1) {
  $sql = "UPDATE `record` SET `draw` = `draw` + 1 WHERE `id` <= 2";
  mysqli_query($conn, $sql);
  header("Location: index.php?save=draw");
  exit();
} else if (($win == 0) && ($lose == 0) && ($daw == 0)) {
    header("Location: index.php?playfirst");
    exit();
}

} else {
	header("Location: index.php?save=fail");
	exit();
}
