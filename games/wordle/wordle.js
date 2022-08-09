var height = 6;
var width = 5;

var row = 0;
var col = 0;

var gameOver = false;
var Woordenlijst = [
  "ubada",
  "afwas",
  "afzak",
  "blijf",
  "babys",
  "check",
  "chips",
  "crazy",
  "smart",
  "boten",
  "avond",
  "april",
  "algen",
  "alarm",
  "gooit",
  "hoopt",
  "haast",
  "koken",
  "oogst",
  "omver",
  "plots",
  "ruikt",
  "tapijt",
  "vocht",
  "dicht",
  "extra",
  "jacht",
  "kwijt",
  "inbox",
  "lobby",
  "kijkt",
  "mixer",
  "puppy",
  "pizza",
  "level",
  "pixel",
  "schip",
  "wacht",
  "wijkt",
  "zucht",
  "zwijn",
  "mixed",
  "zonen",
  "zones",
  "koken",
  "enzym",
  "hobby",
  "avond",
  "zomer",
  "zadel",
  "zagen",
  "zwart",
  "zeven",
  "zoekt",
  "lingo",
  "zweet",
  "optel",
  "otter",
  "ouder",
  "nepal",
  "netto",
  "negen",
  "magic",
  "metro",
  "kerst",
  "japan",
  "index",
  "haren",
  "hacks",
];

var Raadlijst = [
  "a",
  "b",
  "c",
  "d",
  "e",
  "f",
  "g",
  "h",
  "i",
  "j",
  "k",
  "l",
  "m",
  "n",
  "o",
  "p",
  "q",
  "r",
  "s",
  "t",
  "u",
  "v",
  "w",
  "x",
  "y",
  "z",
];

Raadlijst = Raadlijst.concat(Woordenlijst);

var word =
  Woordenlijst[Math.floor(Math.random() * Woordenlijst.length)].toUpperCase();
console.log(word);

window.onload = function () {
  intialize();
};

function intialize() {
  for (let r = 0; r < height; r++) {
    for (let c = 0; c < width; c++) {
      let tile = document.createElement("span");
      tile.id = r.toString() + "-" + c.toString();
      tile.classList.add("tile");
      tile.innerText = "";
      document.getElementById("board").appendChild(tile);
    }
  }

  let keyboard = [
    ["Q", "W", "E", "R", "T", "Y", "U", "I", "O", "P"],
    ["A", "S", "D", "F", "G", "H", "J", "K", "L", " "],
    ["Enter", "Z", "X", "C", "V", "B", "N", "M", "⌫"],
  ];

  for (let i = 0; i < keyboard.length; i++) {
    let currRow = keyboard[i];
    let keyboardRow = document.createElement("div");
    keyboardRow.classList.add("keyboard-row");

    for (let j = 0; j < currRow.length; j++) {
      let keyTile = document.createElement("div");

      let key = currRow[j];
      keyTile.innerText = key;
      if (key == "Enter") {
        keyTile.id = "Enter";
      } else if (key == "⌫") {
        keyTile.id = "Backspace";
      } else if ("A" <= key && key <= "Z") {
        keyTile.id = "Key" + key; // "Key" + "A";
      }

      keyTile.addEventListener("click", processKey);

      if (key == "Enter") {
        keyTile.classList.add("enter-key-tile");
      } else {
        keyTile.classList.add("key-tile");
      }
      keyboardRow.appendChild(keyTile);
    }
    document.body.appendChild(keyboardRow);
  }

  document.addEventListener("keyup", (e) => {
    processInput(e);
  });
}

function processKey() {
  e = { code: this.id };
  processInput(e);
}

function processInput(e) {
  if (gameOver) return;

  if ("KeyA" <= e.code && e.code <= "KeyZ") {
    if (col < width) {
      let currTile = document.getElementById(
        row.toString() + "-" + col.toString()
      );
      if (currTile.innerText == "") {
        currTile.innerText = e.code[3];
        col += 1;
      }
    }
  } else if (e.code == "Backspace") {
    if (0 < col && col <= width) {
      col -= 1;
    }
    let currTile = document.getElementById(
      row.toString() + "-" + col.toString()
    );
    currTile.innerText = "";
  } else if (e.code == "Enter") {
    update();
  }

  if (!gameOver && row == height) {
    gameOver = true;
    document.getElementById("answer").innerText = word ;
  }
}
function update() {
  let guess = "";
  document.getElementById("answer").innerText = "";

  for (let c = 0; c < width; c++) {
    let currTile = document.getElementById(row.toString() + "-" + c.toString());
    let letter = currTile.innerText;
    guess += letter;
  }

  guess = guess.toLowerCase();
  console.log(guess);

  let correct = 0;

  let letterCount = {};
  for (let i = 0; i < word.length; i++) {
    let letter = word[i];

    if (letterCount[letter]) {
      letterCount[letter] += 1;
    } else {
      letterCount[letter] = 1;
    }
  }

  console.log(letterCount);

  for (let c = 0; c < width; c++) {
    let currTile = document.getElementById(row.toString() + "-" + c.toString());
    let letter = currTile.innerText;

    if (word[c] == letter) {
      currTile.classList.add("correct");

      let keyTile = document.getElementById("Key" + letter);
      keyTile.classList.remove("present");
      keyTile.classList.add("correct");
      

      correct += 1;
      letterCount[letter] -= 1;
    }

    if (correct == width) {
      gameOver = true;
      document.getElementById("answer").innerText = "Gewonnen!";
    }
  }

  console.log(letterCount);
  for (let c = 0; c < width; c++) {
    let currTile = document.getElementById(row.toString() + "-" + c.toString());
    let letter = currTile.innerText;

    if (!currTile.classList.contains("correct")) {
      if (word.includes(letter) && letterCount[letter] > 0) {
        currTile.classList.add("present");

        let keyTile = document.getElementById("Key" + letter);
        if (!keyTile.classList.contains("correct")) {
          keyTile.classList.add("present");
        }
        letterCount[letter] -= 1;
      } else {
        currTile.classList.add("absent");
        let keyTile = document.getElementById("Key" + letter);
        keyTile.classList.add("absent");
      }
    }
  }

  row += 1;
  col = 0;
}




// }
// var upgradeTijd = 172801;
// var seconden = upgradeTijd;

// function timer() {
//   var urenover = Math.floor(seconden - 1 * 86400);
//   var uren = Math.floor(urenover / 3600);
//   var minutenover = Math.floor(urenover - uren * 3600);
//   var minuten = Math.floor(minutenover / 60);
//   var resterendesecondes = seconden % 60;
//   function pad(n) {
//     return n < 10 ? "0" + n : n;
//   }
//   document.getElementById("countdown").innerHTML =
//     pad(uren) + ":" + pad(minuten) + ":" + pad(resterendesecondes);
//   if (seconden == 0) {
//     clearInterval(countdownTimer);
//     document.getElementById("countdown").innerHTML = "Completed";
//   } else {
//     seconden--;
//   }
// }
// var countdownTimer;

// document.getElementById("knop").addEventListener("click", starttimer);

// function starttimer() {
//   if (!countdownTimer) {
//     countdownTimer = setInterval("timer()", 1000);
//   }
// }
