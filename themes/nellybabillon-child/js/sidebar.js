
console.log('🐸');

let smileyDiv = document.querySelector('.smiley-container');
let smileyTxt = document.querySelector('.smiley-txt-icon');

smileyDiv.animate([
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

smileyTxt.animate([
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


let contactWrapper = document.querySelector('.overlay');
let link = document.querySelectorAll('.bio-wrapper a')
const transition_el = document.querySelector(".transition-contact");


link.forEach((el) => {
  el.addEventListener("click", (e) => {
    e.preventDefault();
    let target = e.currentTarget.href;

    // Add fade-in class
    transition_el.classList.add("fade-in");
    transition_el.classList.remove("fade-out");

    // Wait for the fade-in animation to complete
    transition_el.addEventListener("animationend", function fadeInHandler(event) {
      if (event.animationName === "squeezeIn") {
        // Check if the element has the fade-in class before adding fade-out
        if (transition_el.classList.contains("fade-in")) {
          transition_el.classList.remove("fade-in");
          transition_el.classList.add("fade-out");
          window.location.href = target;
          console.log('Redirecting to:', target);
        }

        // Wait for the fade-out animation to complete
        transition_el.addEventListener("animationend", function fadeOutHandler(event) {
          if (event.animationName === "squeezeOut") {
            // Remove fade-out and clean up
            transition_el.classList.remove("fade-out");

            // Clean up event listeners
            transition_el.removeEventListener("animationend", fadeOutHandler);
          }
        });

        // Clean up the fade-in event listener
        transition_el.removeEventListener("animationend", fadeInHandler);
      }
    });
  });
});