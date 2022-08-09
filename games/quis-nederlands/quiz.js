let questions = [
  {
    numb: 1,
    question: "persoonsvorm 'Ik loop naar de stad met mijn vriendin'",
    answer: "loop",
    options: ["Ik", "loop", "naar", "stad"],
  },
  {
    numb: 2,
    question: "Engelse leenwoorden",
    answer: "Uitloggen",
    options: ["Uitlogen", "Uitlog", "Uitloggen!", "Uitloggen"],
  },
  {
    numb: 3,
    question: "persoonsvorm 'Zij houdt van pindakaas met hagelslag'",
    answer: "houdt",
    options: ["Zij", "pindakaas", "hagelslag", "houdt"],
  },
  {
    numb: 4,
    question: "Engelse leenwoorden",
    answer: "Googelen",
    options: ["Googellen", "Gogelen", "Googellen", "Googelen"],
  },
  {
    numb: 5,
    question: "persoonsvorm 'Wij fietsen erg graag'",
    answer: "fietsen",
    options: ["graag", "erg", "fietsen", "Wij"],
  },
  {
    numb: 6,
    question: "persoonsvorm 'Kees en Piet gaan naar de stad'",
    answer: "gaan",
    options: ["Kees", "gaan", "naar", "stad"],
  },
  {
    numb: 7,
    question: "Engelse leenwoorden",
    answer: "Mailen",
    options: ["Maillen", "Maaillen", "Moilen", "Mailen"],
  },
  {
    numb: 8,
    question: "Engelse leenwoorden.",
    answer: "Timen",
    options: ["Timmen", "Temen", "Timen", "Timeen"],
  },
  {
    numb: 9,
    question: "persoonsvorm 'Ren jij altijd zo hard?'",
    answer: "Ren",
    options: ["Ren", "hard", "jij", "altijd"],
  },
  {
    numb: 10,
    question: "Engelse leenwoorden",
    answer: "Downloaden",
    options: ["Dawnloaden", "Downloaden", "Dowenloaden", "Downlloaden"],
  },
];
//selecting all required elements
const start_btn_pv = document.querySelector(".start_btn_pv button");
const remove_btn = document.querySelector(".start_btn_pv");

const quiz_box = document.querySelector(".quiz_box_pv");
const result_box = document.querySelector(".result_box_pv");
const option_list = document.querySelector(".option_list_pv");
const time_line = document.querySelector("header .time_line_pv");
const timeText = document.querySelector(".timer .time_left_txt_pv");
const timeCount = document.querySelector(".timer .timer_sec_pv");
const saveButton = document.getElementById("save-score");
const username = document.getElementById("username");
// if startQuiz button clicked
start_btn_pv.onclick = () => {
  quiz_box.classList.add("activeQuiz"); //show info box
  remove_btn.classList.add("remove_btn"); //hide info box
  showQuetions(0); //calling showQestions function
  queCounter(1); //passing 1 parameter to queCounter
  startTimer(15); //calling startTimer function
  startTimerLine(0); //calling startTimerLine function
};

let timeValue = 14;
let que_count = 0;
let que_numb = 1;
let userScore = 0;
let counter;
let counterLine;
let widthValue = 0;

// const restart_quiz = result_box.querySelector(".buttons_pv .restart_pv");
const quit_quiz = result_box.querySelector(".buttons_pv .quit_pv");

// if quitQuiz button clicked
quit_quiz.onclick = () => {
  window.location.reload(); //reload the current window
};

const next_btn = document.querySelector("footer .next_btn_pv");
const bottom_ques_counter = document.querySelector("footer .total_que_pv");

// if Next Que button clicked
next_btn.onclick = () => {
  if (que_count < questions.length - 1) {
    //if question count is less than total question length
    que_count++; //increment the que_count value
    que_numb++; //increment the que_numb value
    showQuetions(que_count); //calling showQestions function
    queCounter(que_numb); //passing que_numb value to queCounter
    clearInterval(counter); //clear counter
    clearInterval(counterLine); //clear counterLine
    startTimer(timeValue); //calling startTimer function
    startTimerLine(widthValue); //calling startTimerLine function
    timeText.textContent = "Tijd over"; //change the timeText to Time Left
    next_btn.classList.remove("show"); //hide the next button
  } else {
    clearInterval(counter); //clear counter
    clearInterval(counterLine); //clear counterLine
    showResult(); //calling showResult function
  }
};

// getting questions and options from array
function showQuetions(index) {
  const que_text = document.querySelector(".que_text_pv");

  //creating a new span and div tag for question and option and passing the value using array index
  let que_tag =
    "<span>" +
    questions[index].numb +
    ". " +
    questions[index].question +
    "</span>";
  let option_tag =
    '<div class="option"><span>' +
    questions[index].options[0] +
    "</span></div>" +
    '<div class="option"><span>' +
    questions[index].options[1] +
    "</span></div>" +
    '<div class="option"><span>' +
    questions[index].options[2] +
    "</span></div>" +
    '<div class="option"><span>' +
    questions[index].options[3] +
    "</span></div>";
  que_text.innerHTML = que_tag; //adding new span tag inside que_tag
  option_list.innerHTML = option_tag; //adding new div tag inside option_tag

  const option = option_list.querySelectorAll(".option");

  // set onclick attribute to all available options
  for (i = 0; i < option.length; i++) {
    option[i].setAttribute("onclick", "optionSelected(this)");
  }
}
// creating the new div tags which for icons
let tickIconTag =
  '<div class="icon tick"><i class="fa fa-check" aria-hidden="true"></i></div>';
let crossIconTag =
  '<div class="icon cross"><i class="fa fa-times" aria-hidden="true"></i></div>';

//if user clicked on option
function optionSelected(answer) {
  clearInterval(counter); //clear counter
  clearInterval(counterLine); //clear counterLine
  let userAns = answer.textContent; //getting user selected option
  let correcAns = questions[que_count].answer; //getting correct answer from array
  const allOptions = option_list.children.length; //getting all option items

  if (userAns == correcAns) {
    //if user selected option is equal to array's correct answer
    userScore += 50; //upgrading score value with 1
    answer.classList.add("correct"); //adding green color to correct selected option
    answer.insertAdjacentHTML("beforeend", tickIconTag); //adding tick icon to correct selected option
    console.log("Correct Answer");
    console.log("Your correct answers = " + userScore);
  } else {
    answer.classList.add("incorrect"); //adding red color to correct selected option
    answer.insertAdjacentHTML("beforeend", crossIconTag); //adding cross icon to correct selected option
    console.log("Wrong Answer");

    for (i = 0; i < allOptions; i++) {
      if (option_list.children[i].textContent == correcAns) {
        //if there is an option which is matched to an array answer
        option_list.children[i].setAttribute("class", "option correct"); //adding green color to matched option
        option_list.children[i].insertAdjacentHTML("beforeend", tickIconTag); //adding tick icon to matched option
        console.log("Auto selected correct answer.");
      }
    }
  }
  for (i = 0; i < allOptions; i++) {
    option_list.children[i].classList.add("disabled"); //once user select an option then disabled all options
  }
  next_btn.classList.add("show"); //show the next button if user selected any option
}

function showResult() {
  // info_box.classList.remove("activeInfo"); //hide info box
  quiz_box.classList.remove("activeQuiz"); //hide quiz box
  result_box.classList.add("activeResult"); //show result box
  const scoreText = result_box.querySelector(".score_text_pv");
  if (userScore > 8) {
    // if user scored more than 8
    //creating a new span tag and passing the user score number and total question number
    let scoreTag =
      "<span>gefeliciteerd!, jij hebt <input id='score' name='score' value='" +
      userScore +
      "'' readonly>" +
      "goed</span>";
    scoreText.innerHTML = scoreTag; //adding new span tag inside score_Text
  } else if (userScore > 5) {
    // if user scored more than 5
    let scoreTag =
      "<span>leuk, jij hebt <input id='score' name='score' value='" +
      userScore +
      "'' readonly>" +
      "goed</span>";
    scoreText.innerHTML = scoreTag;
  } else {
    // if user scored less than 5
    let scoreTag =
      "<span>sorry, jij hebt allen <input id='score' name='score' value='" +
      userScore +
      "'' readonly>" +
      "goed</span>";
    scoreText.innerHTML = scoreTag;
  }
}

function startTimer(time) {
  counter = setInterval(timer, 1000);
  function timer() {
    timeCount.textContent = time; //changing the value of timeCount with time value
    time--; //decrement the time value
    if (time < 9) {
      //if timer is less than 9
      let addZero = timeCount.textContent;
      timeCount.textContent = "0" + addZero; //add a 0 before time value
    }
    if (time < 0) {
      //if timer is less than 0
      clearInterval(counter); //clear counter
      timeText.textContent = "Tijd over"; //change the time text to Tijd over
      const allOptions = option_list.children.length; //getting all option items
      let correcAns = questions[que_count].answer; //getting correct answer from array
      for (i = 0; i < allOptions; i++) {
        if (option_list.children[i].textContent == correcAns) {
          //if there is an option which is matched to an array answer
          option_list.children[i].setAttribute("class", "option correct"); //adding green color to matched option
          option_list.children[i].insertAdjacentHTML("beforeend", tickIconTag); //adding tick icon to matched option
          console.log("Tijd over: Automatisch het juiste antwoord selecteren.");
        }
      }
      for (i = 0; i < allOptions; i++) {
        option_list.children[i].classList.add("disabled"); //once user select an option then disabled all options
      }
      next_btn.classList.add("show"); //show the next button if user selected any option
    }
  }
}

function startTimerLine(time) {
  counterLine = setInterval(timer, 19);
  function timer() {
    time += 1; //upgrading time value with 1
    time_line.style.width = time + "px"; //increasing width of time_line with px by time value
    if (time > 850) {
      //if time value is greater than 549
      clearInterval(counterLine); //clear counterLine
    }
  }
}

function queCounter(index) {
  //creating a new span tag and passing the question number and total question
  let totalQueCounTag =
    "<span><p>" +
    index +
    "</p> of <p>" +
    questions.length +
    "</p> Questions</span>";
  bottom_ques_counter.innerHTML = totalQueCounTag; //adding new span tag inside bottom_ques_counter
}

/*------------------------------------------*/
$(document).ready(function () {
  $("#butsave").on("click", function () {
    $("#butsave").attr("disabled", "disabled");
    var score = $("#score").val();
    if (score != "") {
      $.ajax({
        url: "save.php",
        type: "POST",
        data: {
          score: score,
        },
        cache: false,
        success: function (dataResult) {
          var dataResult = JSON.parse(dataResult);
          if (dataResult.statusCode == 200) {
            $("#butsave").removeAttr("disabled");
            $("#fupForm").find("input:text").val("");
            $("#success").show();
            $("#success").alert("Success!");
          } else if (dataResult.statusCode == 201) {
            alert("Error occured !");
          }
        },
      });
    } else {
      alert("er is iets mis gegaan");
    }
  });
});
