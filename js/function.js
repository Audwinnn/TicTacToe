
//players
var players = [];
players[0] = "Player1 (X)";
players[1] = "Player2 (O)";

//Click Input
var marker = ["X", "O"];

//transition
var points = [];
var turn = 0;
gameOver = false;

//Win Combos
var winValues = [7,56,73,84,146,273,292,448];

//Scores
var totalwins = [];
totalwins[0] = 0;
totalwins[1] = 0;

//Mactch Result
function displaywin() {
  document.getElementById('player1').innerText ="Player1 wins: " + totalwins[0];
  document.getElementById('player2').innerText ="Player2 wins: " + totalwins[1];
}

//Play again button
function reset() {
  gameOver = false;
  points = [0,0];
  drawBoard();
}
//Div Board
function drawBoard() {
  var display = "";
  var count = 1;
  for (var i = 1; i <= 3; i++)
  {
    display += '<div id="row-'+ i +'">';
    for (var j = 0; j < 3; j++)
    {
      display += '<div onclick="play(this,'+count+');"></div>';
      count *=2;
    }
      display +=  '</div>';
  }
    display += '<button id="play-again" class="button hide" onclick="reset();">PLAY AGAIN</button>'
    document.getElementById('board').innerHTML = display;
}

//End button
function finish(clickedButton) {
  if (totalwins[0] > totalwins[1]) {
    alert(players[0] + " Wins!");
    document.getElementById('win').value = 1;
    totalwins = [0,0];
    reset();
  } else if (totalwins[0] == totalwins[1]) {
    alert("DRAW!");
    document.getElementById('draw').value = 1;
    totalwins = [0,0];
    reset();
  } else if (totalwins[0] < totalwins[1]){
    alert(players[1] + " Wins!");
    document.getElementById('lose').value = 1;
    totalwins = [0,0];
    reset();
  }
}

//Wins
function WinCheck() {
 for (var i = 0; i < winValues.length; i++) {
   if ((points[turn] & winValues[i]) == winValues[i]) {
     document.getElementById('game-message').innerText = players[turn] + " Wins!";
     gameOver = true;
     totalwins[turn] += 1;
     displaywin();
   }
 }
 if (((points[0] + points[1]) == 511) && !gameOver) {
   document.getElementById('game-message').innerText = "No Wins!";
   gameOver = true;
 }
}

//start
function play(clickedDiv, divValue) {
  if (!gameOver) {
    points[turn] +=divValue;
    clickedDiv.onclick = "";
    clickedDiv.innerHTML = "<span>" + marker[turn] + "</span>";
    WinCheck();
    if (!gameOver) {
      toggle();
    } else {
      document.getElementById('play-again').className = "button";
    }
  }
}

//turn
function toggle() {
  if (turn == 0) turn = 1;
  else turn = 0;

  document.getElementById('game-message').innerText = players[turn] + " Turn!";
}
