const highScoreList = document.querySelector(".leaderboard");
const highScores = JSON.parse(localStorage.getItem("highScores")) || [];

highScoreList.innerHTML = highScores
.map(score => {
   return `<div class="navbar-gebruikers">
    <div class="resultaat-kolom">
      <span class="resultaat-naam">${score.name}</span>
    </div>
    <div class="resultaat-kolom">
      <span class="resultaat-punten">${score.score}</span>
    </div>
  </div>`;
}).join("");
//console.log(highScores)

// back to home-page

function navigateHome() {
  window.location.href = "index.php";
}