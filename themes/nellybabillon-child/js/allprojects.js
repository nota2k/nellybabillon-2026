console.log('🦑');

//Hover on project

let projectDiv = document.querySelectorAll(".single-project")
let bioDiv = document.querySelector(".bio-container")
let bioDivWidth = bioDiv.getBoundingClientRect().width
let header = document.querySelector('header')

let thmbProject = document.querySelector(".thmb-project")
let titleBloc = document.querySelector(".title-project-wrapper")

let infobisDiv = document.querySelector(".infobis-wrapper")
let mainContainer = document.querySelector(".main-container")
let projectsContainer = document.querySelector(".projects-container")

let tableProject = []
let selectP = 0

projectDiv.forEach((project) => {
        project.addEventListener("mouseenter", (e) => {
            scaleColumnIn(e)
            resizeSideBar()
        });

        project.addEventListener("mouseleave", (e) => {
            scaleColumnOut(e)
            e.target.classList.remove("selected");
        });
})
    projectsContainer.addEventListener("mouseenter", () => {
        mainContainer.classList.add("scaled");
        infobisDiv.classList.add("out");
    });

    projectsContainer.addEventListener("mouseleave", () => {
        mainContainer.classList.remove("scaled");
        infobisDiv.classList.remove("out");
    });

function resizeSideBar(event) {
    // let sizeBio = 0;
    if (event) {
        let sizeBio = bioDiv.getBoundingClientRect().width

        if (sizeBio < 300) {
            infobisDiv.style.display = "none";
        } else if (sizeBio >= 90) {
            infobisDiv.style.display = "inherit";
        }
    }


}

function scaleColumnIn(event) {

    //Scale sur le projet target au survol
    if(window.innerWidth > 600) {
        event.target.classList.add("active");
    }    
    // Scroll to à l'ouverture;
    let topWindow = event.target.getBoundingClientRect().top + window.scrollY;
    let contactDiv = document.querySelector('.contact-wrapper')

    contactDiv.classList.add('mini')
}

function scaleColumnOut(event) {

    event.target.classList.remove("active");
    const infoProjectDiv = document.querySelector(".infoproject")
    let contactDiv = document.querySelector('.contact-wrapper')

    contactDiv.classList.remove('mini')
    titleBloc.classList.remove("open")

    let rect = bioDiv.getBoundingClientRect().right;
}

// Filter projetcs

let filterBtn = document.querySelectorAll('.filter-btn');

function filter_project(category) {
    projectDiv.forEach(project => {
        if (!project.classList.contains(category) == true) {
            project.style.transition = 'opacity 1s, height 1s';
            project.style.opacity = '0';
            project.style.height = '0';
            setTimeout(function(){
                project.style.display = "none";
            }, 1000);
        } else {
            project.style.display = "block";
            setTimeout(function(){
                project.style.transition = 'opacity 1s, height 1s';
                project.style.opacity = '1';
                if(window.innerWidth > 600) {   
                project.style.height = '13vh';
                }else{ project.style.height = 'auto';
            }}, 100);
        }
    });
}

let result = []

// Récupérer l'URL actuelle
var currentUrl = window.location.href;

// Extraire le fragment d'URL (la partie après le '#')
var urlFragment = currentUrl.split('#')[1];

// Si un fragment d'URL existe, utilisez-le pour filtrer les projets
if (urlFragment) {
    filter_project(urlFragment);
}

filterBtn.forEach((item) => {

    item.addEventListener("click", (e) => {
        const filterLink = item.firstChild
        category = filterLink.getAttribute('data-filter')
        filter_project(category);
        // change_colors_filter(category)
    })


})

// Change color
// console.log(styleSheets)

let textColorEl = document.querySelectorAll('p, a, li, ul, h1, h2, h3, h4, label, input')
let backgroundColorEl = document.querySelectorAll('button, .filter-btn, .active-tag, .infoproject')
let borderColorEl = document.querySelectorAll('.bio-wrapper, .single-project, .filter-btn')


// let colorChange = 'var(--wp--preset--color--blue-primary)'
let color = 'var(--wp--preset--color--blue-primary)'



// console.log(backgroundColorEl)
// function change_colors_filter(category,color){
// 	let reglesCSS = document.querySelector('#nellybabillon-style-css').sheet.cssRules;
// 	// console.log(reglesCSS)
// 	// let color = ''
// 	switch (category) {
// 	case 'graphisme':
// 		color = '#ff00a7'
// 		// console.log('pink');
// 		break;
// 	case 'identite-visuelle':
// 		color = '#41ffaf'
// 		// console.log('orange');
// 		break;
// 	case 'photographie':
// 		color = '#16ff16'
// 		// console.log('green');
// 		break;
// 	case 'print':
// 		color = '#FC5323'
// 		// console.log('#FC5323');
// 		break;
// 	case 'web':
// 		color = '#D900FF'
// 		// console.log('#D900FF');
// 		break;
// 	case 'webdesign':
// 		color = '#ff4430'
// 		// console.log('gray');
// 		break;
// 	default:
// 		color = 'var(--wp--preset--color--blue-primary)'
// 		// console.log('defaut')
// 		break;
// 	}
// 	textColorEl.forEach((txt)=>{
// 			txt.setAttribute('style',`color:${color}`)
// 	})

// 	backgroundColorEl.forEach((bckg)=>{
// 			// let btnFilter = bckg.querySelector('button')
// 			// console.log(bckg)
// 			if(bckg.classList.contains('filter-btn')){
// 				bckg.addEventListener('mouseenter',()=>{
// 					bckg.setAttribute('style',`background-color:${color}`)
// 				})
// 				bckg.addEventListener('mouseleave',()=>{
// 					bckg.setAttribute('style',`background-color:inherit`)
// 				})

// 			}
// 			bckg.setAttribute('style',`background-color:${color}`)

// 	})

// 	borderColorEl.forEach((border)=>{
// 			border.setAttribute('style',`border-color:${color}`)
// 	})
// 	// console.log(color)
// 	// Parcourez toutes les règles CSS
// 	// for (var i = 0; i < reglesCSS.length; i++) {
// 	//     var regle = reglesCSS[i];
// 	//         if (regle.cssText.includes('color') === 'var(--wp--preset--color--blue-primary)' || regle.cssText.includes('color') || regle.cssText.includes('border-color') || regle.cssText.includes('border-bottom-color') || regle.cssText.includes('background-color') !== '' && regle.cssText.includes('background-image') == ''){
// 	//             // Modifiez la valeur de la propriété CSS
// 	//             // console.log('blue')
// 	//             regle.style.setAttribute('color', color);
// 	//             regle.style.setAttribute('background-color', color);
// 	//             regle.style.setAttribute('border-color', color);
// 	//         }
// 	// }	
// }



