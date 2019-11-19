<?php
	require "hdf/header.php";
?>
<h2>Tic Tac Toe</h2>
<h3 id="game-message">Click to play</h3>
<table class="content-table">
	<thead>
		<tr>
			<th id="player1"></th>
			<th id="player2"></th>
		</tr>
	<thead>
</table>

<div class="board" id="board"></div>

<form action="save.php" method="post">
<input type="hidden" id="win" name="win" value=id="win">
<input type="hidden" id="lose" name="lose" value=id="lose">
<input type="hidden" id="draw" name="draw" value=id="draw">
<button class="button" type="submit" value="submit" name="submit" onclick="finish(this);">END GAME</button>
</form>

<script src="js/function.js"></script>

<?php
	require "hdf/footer.php";
?>
