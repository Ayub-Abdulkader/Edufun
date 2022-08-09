const questionElement = document.querySelector(".question")
const mathForm = document.querySelector(".math-form")
const mathField = document.querySelector(".math-field")
const pointNeeded = document.querySelector(".score_count")
const mistakes = document.querySelector(".mistakes-made")
const progressBar = document.querySelector(".progress-inner")
const endMessage = document.querySelector(".end-message")
const resetButton = document.querySelector(".start-over")
const timeincrement = document.querySelector(".timer_sec");
const username = document.getElementById("username");
const saveButton = document.getElementById("save-score");

let state = {
    score: 0,
    wrongAnswers: 0,
    sec: 20
}

function updateQuestion() {
    state.currentQuestion = generateQuestion()
    if ((state.currentQuestion.firstNum % state.currentQuestion.secondNum) == 0 && (state.currentQuestion.firstNum / state.currentQuestion.secondNum) !== 1) {
        state.currentQuestion.operator = "/";
        questionElement.innerHTML = `${state.currentQuestion.firstNum} / ${state.currentQuestion.secondNum}`
    }
    questionElement.innerHTML = `${state.currentQuestion.firstNum} ${state.currentQuestion.operator} ${state.currentQuestion.secondNum}`
    mathField.value = "";
    mathField.focus();
}
updateQuestion()

function getRandomDivBy5(min, max) {
    return getRandomInt(min / 2, max / 2) * 2;
}

function getRandomInt(min, max) {
    return Math.floor(Math.random() * (max - min + 1) + min);
}

function generateQuestion() {
    return {
        firstNum: getRandomDivBy5(5, 30),
        secondNum: getRandomDivBy5(2, 15),
        operator: ['+', '-', 'x'][getRandomInt(0, 2)]
    }
}

// timer function
var time = setInterval(myTimer, 1000);

function myTimer() {
    timeincrement.innerHTML = state.sec;
    state.sec--;
    if (state.sec < 0) {
        clearInterval(time);
        endMessage.textContent = "Your score is " + state.score;
        document.body.classList.add("show-overlay")
        setTimeout(() => resetButton.focus(), 330)
    }
}

mathForm.addEventListener("submit", submitHandler)

function submitHandler(e) {
    e.preventDefault();
    let correctAnswer
    const question = state.currentQuestion;
    if (question.operator == "+") correctAnswer = question.firstNum + question.secondNum;
    if (question.operator == "-") correctAnswer = question.firstNum - question.secondNum;
    if (question.operator == "x") correctAnswer = question.firstNum * question.secondNum;
    if (question.operator == "/") correctAnswer = question.firstNum / question.secondNum;

    if (parseInt(mathField.value, 10) === correctAnswer) {
        state.score += 50;
        state.sec += 5;
        timeincrement.textContent = state.sec
        clearInterval(state.sec);
        myTimer();
        pointNeeded.textContent = state.score;
        updateQuestion();
        renderProgress();
    } else {
        state.wrongAnswers++
        state.sec -= 2;
        timeincrement.textContent = state.sec;
        clearInterval(state.sec);
        myTimer();
        mistakes.textContent = 10 - state.wrongAnswers;
        questionElement.classList.add("animate-wrong")
        setTimeout(() => questionElement.classList.remove("animate-wrong"), 451)
        updateQuestion()
    }
    checkstatus()
}

function checkstatus() {
    // you won
    
    if (state.score === 10000) {
        endMessage.textContent = "Congrats! You reached the maximum score!.";
        document.body.classList.add("show-overlay")
        setTimeout(() => resetButton.focus(), 330)
    }
    // you lost
    if (state.wrongAnswers === 6) {
        endMessage.textContent = "Try again!";
        document.body.classList.add("show-overlay")
        setTimeout(() => resetButton.focus(), 330)
    }
}
resetButton.addEventListener("click", resetGame)

function resetGame() {
    document.body.classList.remove("show-overlay")
    updateQuestion()
    var time = setInterval(myTimer, 1000);

function myTimer() {
    timeincrement.innerHTML = state.sec;
    state.sec--;
    if (state.sec < 0) {
        clearInterval(time);
        endMessage.textContent = "Your score is " + state.score;
        document.body.classList.add("show-overlay")
        setTimeout(() => resetButton.focus(), 330)
    }
}
    state.score = 0;
    state.wrongAnswers = 0;
    state.sec = 20;
    pointNeeded.textContent = 10;
    mistakes.textContent = 6;
    renderProgress()
}

function renderProgress() {
    progressBar.style.transform = `scaleX(${state.score / 10000})`
}


function navigateScore() {
    window.location.href = "highscore.php";
}
function navigateHome() {
    window.location.href = "index.php";
}

// saving high scores
// Post to php with AJAX

function saveScore(saveButton) {
    let score = state.score;
    $.post('score.php', {postscore:score},
    function(data) {
        $('#name').html(data);
    });

    saveButton.disabled = true;
}
