console.log('🦞');

// let projectDiv = document.querySelectorAll(".single-project")

// let mainContainer = document.querySelector(".main-container")
// let projectsContainer = document.querySelector(".projects-container")
let lineWrapper = document.querySelector('.line-wrapper')

let allCvDiv = document.querySelectorAll('.cv-container > *:not(.intro-container,.line-wrapper)');
console.log(allCvDiv)

// Add markers on scroll

let expTitleDiv = document.querySelectorAll('.experiences-title');
let colLeft = document.querySelectorAll('.col-left');
let colRight = document.querySelectorAll('.col-right');

let competencesBlock = document.querySelectorAll('.bloc-competences')
let competences = document.querySelectorAll('h2.competences')

//Get Y position of element

function getOffset( el ) {
    var _y = 0;
    while( el && !isNaN( el.offsetTop ) ) {
        _y += el.offsetTop - el.scrollTop;
        el = el.offsetParent;
    }
    return { top: _y};
}

//Add markers to each title

expTitleDiv.forEach((item)=>{
	let newMarker = document.createElement("div");
	let newCircle = document.createElement("div");
	let newCircleLine = document.createElement("span");

	newMarker.classList.add("marker")
	newCircle.classList.add("circle")

	newMarker.appendChild(newCircle)

	lineWrapper.appendChild(newMarker)

	itemPos = getOffset(item).top
	newMarker.style.top = itemPos + "px"	

	if(item.parentElement.classList.contains('col-left')){
		newMarker.classList.add('m-left')
	} else {
		newMarker.classList.add('m-right')
	}

})

let markerDiv = document.querySelectorAll('.marker')

//Animation center line

// Get the id of the <path> element and the length of <path>
let firstBloc = document.querySelector('.cv-title.formations')
let firstBlocPos = getOffset(firstBloc).top

let lineSVG = document.querySelector('#line');
let svgDiv = document.querySelector('#svg_01');

let winH = Math.max(document.body.offsetHeight)
// console.log(winH)

svgDiv.setAttribute('height', winH)
lineSVG.setAttribute('y2', winH)

let length = lineSVG.getTotalLength();

// The start position of the drawing
lineSVG.style.strokeDasharray = length - 400;

// Hide the triangle by offsetting dash. Remove this line to show the triangle before scroll draw
lineSVG.style.strokeDashoffset = length;

// Find scroll percentage on scroll (using cross-browser properties), and offset dash same amount as percentage scrolled
window.addEventListener("scroll", lineDrawing);

function lineDrawing() {
let posY = window.innerHeight / 2;

// console.log(posY)
let scrollpercent = (posY + document.documentElement.scrollTop) / (document.documentElement.scrollHeight - document.documentElement.clientHeight);

  let draw = length * scrollpercent;
  
  // Reverse the drawing (when scrolling upwards)
  lineSVG.style.strokeDashoffset = length - draw;
}

//Split Intro text into multilines

// let txtIntroP = "Passionnée de musique et d’art, je suis une vraie curieuse compulsive, toujours à chercher de la matière pour mon enrichissement personnel et professionnel. Autodidacte très tôt, je suis quelqu’un d’exigeant dans mon travail, car c’est pour moi un moyen d’évoluer et de m’épanouir dans ce que je fais."
let txtBio = document.querySelector('.intro-txt-container')
let txtIntroP = txtBio.getAttribute('data-bio') || "Graphic Designer,Webdesigner,Front-End Developer"
let txtSplitted = txtIntroP
let arrayTxtIntro = []

arrayTxtIntro.push(txtIntroP.slice(0,16),txtIntroP.slice(17,29),txtIntroP.slice(29,50))
// arrayTxtIntro.push(txtIntroP.slice(0,32),txtIntroP.slice(32,58),txtIntroP.slice(58,90),txtIntroP.slice(91,110),txtIntroP.slice(110,138),txtIntroP.slice(138,169),txtIntroP.slice(169,207),txtIntroP.slice(208,240),txtIntroP.slice(240,269),txtIntroP.slice(269))

arrayTxtIntro.forEach(p=>{
	const pTxt = document.createElement('p');
	pTxt.classList.add('txt-bio');
	pTxt.textContent = p
	txtBio.appendChild(pTxt)
})

// Position from top of viewport

function fromTopVp(el){
	
	// const vpTop = document.scrollTop
}

const txtBioLine = document.querySelectorAll('p.txt-bio')

const interval = 900;

let vpH = window.innerHeight / 3;

// console.log(vpH)

txtBioLine.forEach((item,idx)=>{
	const elementTop = item.getBoundingClientRect().top;
	
	if(elementTop > vpH){
		setTimeout(function(){
			item.style.animationPlayState="running"
		}, idx * interval)
	} else {
		setTimeout(function(){
			item.style.animationDirection = 'reverse'
		}, idx * interval)
	}	
	
});

// Blocks appears on scroll

const elementInView = (el, dividend = 1) => {
  const elementTop = el.getBoundingClientRect().top;

  return (
    elementTop <=
    (window.innerHeight || document.documentElement.clientHeight) / dividend
  );
};

const elementOutofView = (el) => {
  const elementTop = el.getBoundingClientRect().top;

  return (
    elementTop > (window.innerHeight || document.documentElement.clientHeight)
  );
};

const displayScrollElement = (element) => {
  element.classList.add("scrolled");

};

const hideScrollElement = (element) => {
  element.classList.remove("scrolled");
};

const handleScrollAnimation = () => {
  allCvDiv.forEach((el) => {
    if (elementInView(el, 1.25)) {
      displayScrollElement(el);
    } else if (elementOutofView(el)) {
      hideScrollElement(el)
    }
  })

  markerDiv.forEach((el) => {
    if (elementInView(el, 1.25)) {
      displayScrollElement(el);
    } else if (elementOutofView(el)) {
      hideScrollElement(el)
    }
  })
}

window.addEventListener("scroll", () => { 
  handleScrollAnimation();
});

// Animation download button

let downloadDiv = document.querySelector('.download-cv')
let downloadSVG = document.querySelector('.clickhere')

	downloadSVG.animate( [
    // keyframes
    { transform: "rotate(0deg)" },
    { transform: "rotate(360deg)" },
	  ],
	  {
	    // timing options
	    duration: 7500,
	    iterations: Infinity,
	  }
	);




