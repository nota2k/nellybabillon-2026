
console.log('🦑');

//Hover on project

let projectDiv = document.querySelectorAll(".single-project")
let bioDiv = document.querySelector(".bio-container")
let bioDivWidth = bioDiv.getBoundingClientRect().width

let thmbProject = document.querySelector(".thmb-project")
let titleBloc = document.querySelector(".title-project-wrapper")

let infobisDiv = document.querySelector(".infobis-wrapper")
let mainContainer = document.querySelector(".main-container")
let projectsContainer = document.querySelector(".projects-container")
let contactDiv = document.querySelector(".contact-wrapper")

let tableProject = []
let selectP = 0

projectDiv.forEach((project) =>{

	project.addEventListener("mouseenter", (e) => {
		scaleColumnIn(e)
		resizeSideBar()
	});

	project.addEventListener("mouseleave", (e) => {
		scaleColumnOut(e)
		e.target.classList.remove("selected");
	});	

	project.addEventListener("click", (e) =>{

	    project.classList.add("selected");
	     scaleColumnOut(e)

	    projectDiv.forEach((el)=>{
		    el.target.classList.remove("selected");
		});
	    
	  });  

})

projectsContainer.addEventListener("mouseenter", ()=>{
	mainContainer.classList.add("scaled");
	infobisDiv.classList.add("out");
});

projectsContainer.addEventListener("mouseleave", ()=>{
	mainContainer.classList.remove("scaled");
	infobisDiv.classList.remove("out");
});

function resizeSideBar(event){
	let sizeBio = bioDiv.getBoundingClientRect().width
	
	if(sizeBio < 300){
		// console.log("deformation");
		infobisDiv.style.display="none";
	}
}

function scaleColumnIn(event){

	//Scale sur le projet target au survol
	event.target.classList.add("active");

	// Scroll to à l'ouverture;
	let topWindow = event.target.getBoundingClientRect().top+window.scrollY;

	// // console.log(topWindow)	
	// if(topWindow > 70){
	// 	event.target.scrollTo(0,80)
	// }

	// addInfoProject(event);
	contactDiv.innerHTML = ""
	let newIcon = document.createElement("img");
	newIcon.classList.add("mail-icon")
	newIcon.setAttribute("src","https://www.nellybabillon.fr/wp-content/uploads/2024/01/mail-icon.png")
	contactDiv.appendChild(newIcon)
	// Scroll to à l'ouverture;
}

function scaleColumnOut(event){

	event.target.classList.remove("active");

	const infoProjectDiv = document.querySelector(".infoproject")
	const detail = document.querySelector(".details");

	detail.textContent = ""
	titleBloc.classList.remove("open")
	
	contactDiv.innerHTML = '<p>Contact</p><a href="mailto:nelly.babillon@gmail.com">Mail</a>';

	let rect = bioDiv.getBoundingClientRect().right;
}


// Animation smiley

let smileyDiv = document.querySelector('.smiley-container');
let smileyTxt = document.querySelector('.smiley-txt-icon');

smileyDiv.animate( [
    // keyframes
    { transform: "rotate(0deg)" },
    { transform: "rotate(360deg)" },
  ],
  {
    // timing options
    duration: 2500,
    iterations: Infinity,
  }
);

smileyTxt.animate( [
    // keyframes
    { transform: "rotate(0deg)" },
    { transform: "rotate(-360deg)" },
  ],
  {
    // timing options
    duration: 4500,
    iterations: Infinity,
  }
);

