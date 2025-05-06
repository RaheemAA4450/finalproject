<?php
session_start();
if (!isset($_SESSION['user'])) die("Login required");
?>
<h2>Rock, Paper, Scissors - Best of 3</h2>
<p id="result"></p>
<button onclick="play('rock')">Rock</button>
<button onclick="play('paper')">Paper</button>
<button onclick="play('scissors')">Scissors</button>
<script>
let userScore = 0, compScore = 0;
function play(choice) {
  const comp = ['rock','paper','scissors'][Math.floor(Math.random()*3)];
  let result = '';
  if (choice == comp) result = 'Tie';
  else if ((choice=='rock'&&comp=='scissors')||(choice=='paper'&&comp=='rock')||(choice=='scissors'&&comp=='paper')) {
    userScore++;
    result = 'You win this round';
  } else {
    compScore++;
    result = 'Computer win this round';
  }
  if (userScore == 2 || compScore == 2) {
    result += userScore > compScore ? ' — You win' : ' — You lose';
    fetch('score.php', {method: 'POST', body: new URLSearchParams({
      result: userScore > compScore ? 'win' : 'loss'
    })});
    userScore = compScore = 0;
  }
  document.getElementById('result').innerText = result;
}
</script>