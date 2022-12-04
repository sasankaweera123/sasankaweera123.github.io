var insideText =
  "I'm an undergraduate scholar at General Sir John Kotelawala Defence University. My aspiration is to become a Bachelor of Software Engineering honors. I anticipate developing cognitive skills for critical thinking, and the ability to understand the technical and design elements of software engineering. Through my bachelor's degree, I expect to specialize in Programming and additionally in graphic designing.";

function startTyping(text, des) {
  var iIndex = 0; // start printing array at this posision
  var iTextPos = 0; // initialise text position
  var sContents = ""; // initialise contents variable
  var iRow; // initialise current row

  function typewriter() {
    console.log(text);
    var aText = new Array(String(text)); //var aText = new Array("Sasanka Weerakoon");
    var iArrLength = aText[0].length; // the length of the text array
    sContents = " ";
    iRow = Math.max(0, iIndex - 20); // start scrolling up at this many lines
    var destination = document.getElementById(des);

    while (iRow < iIndex) {
      sContents += aText[iRow++] + "<br />";
    }
    destination.innerHTML =
      sContents + aText[iIndex].substring(0, iTextPos) + "_";
    if (iTextPos++ == iArrLength) {
      iTextPos = 0;
      iIndex++;
      if (iIndex != aText.length) {
        iArrLength = aText[iIndex].length;
        setTimeout(typewriter.bind(null, text, des), 500);
      }
    } else {
      console.log(text);
      setTimeout(typewriter.bind(null, text, des), 100); // time delay of print out
    }
  }

  typewriter();
}

startTyping("Sasanka Weerakoon", "myName");

// button click event
const btn = document.getElementById("btn");

btn.addEventListener("click", () => {
  const box = document.getElementById("container");
  const details = document.getElementById("mydetails");

  box.style.display = "none";
  details.style.display = "block";

  startTyping(insideText, "myText");

  //typewriter(insideText, "myText");
});
