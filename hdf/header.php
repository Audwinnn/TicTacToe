<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>TicTacToe</title>
    <link rel="stylesheet" href="css/style.css">
  </head>
  <table class="content-table" id='table'>
    <thead>
      <tr>
  		  <th>Name</th>
  		  <th>Win</th>
  		  <th>Lose</th>
  		  <th>Draw</th>
  	  </tr>
    </thead>
  	<?php
  	$conn = mysqli_connect("localhost", "root", "", "tictactoe");
  	$sql = "SELECT name, win, lose, draw from record ORDER BY win DESC";
  	$result = mysqli_query($conn, $sql);

  	if ($result-> num_rows > 0) {
  		while ($row = mysqli_fetch_array($result)) {
  			echo "<tr>
                <td>".$row["name"]."</td>
                <td>".$row["win"]."</td>
                <td>".$row["lose"]."</td>
                <td>".$row["draw"]. "</td>
              </tr>";
  		}
  		echo "</table>";
  	}
  	else {
  		echo "0 result";
  	}
  	$conn-> close();
  	 ?>
  </table>
  <body onload="reset();">
