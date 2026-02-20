gsap.registerPlugin(ScrollTrigger);
// home page 
import { header } from "./modules/header.js";
import { heroAnimation } from "./modules/home.js";
import { workGallery } from "./modules/home.js";
import { homeAnimation } from "./modules/home-animation.js";
import { videoPlayer } from "./modules/videoplayer.js";
import { footer } from "./modules/footer.js";


// aboout page
import { aboutAnimation } from "./modules/about-animation.js";


// contat page
import { contactAnimation } from "./modules/contact-animation.js";


// case study
import { caseStudyAnimation } from "./modules/caseStudy-animation.js";

header();
heroAnimation();
workGallery();
homeAnimation();
videoPlayer();
footer();
aboutAnimation();
contactAnimation();
caseStudyAnimation();

// (function() {
// // header navigation close
// const hamburger = document.querySelector('#hamburger');
// const navLinks = document.querySelectorAll('#header-nav nav ul li a');

// navLinks.forEach(link => {
//   link.addEventListener('click', () => {
//     hamburger.checked = false;
//   });
// })

// // hero animation
// gsap.registerPlugin(ScrollTrigger);


// gsap.from(".animated-by-word", {
//         duration: 1,
//         autoAlpha: 0,
//         stagger: .5
//     });


// // video
// const playerCon = document.querySelector("#player-container");
// const player = document.querySelector("video");
// const videoControls = document.querySelector("#video-controls");
// const centerPlayButton = document.querySelector("#center-play-button");
// const playButton = document.querySelector("#play-button");
// const pauseButton = document.querySelector("#pause-button");
// const stopButton = document.querySelector("#stop-button");
// const timeline = document.querySelector("#timeline");
// const volumeSlider = document.querySelector("#change-vol");
// const fullScreen = document.querySelector("#full-screen");


// if (player && playerCon && videoControls) {
// player.controls = false;
// videoControls.classList.remove('hidden');

// function playVideo() {
//     player.play();
//     centerPlayButton.style.display = "none";
// }

// function pauseVideo () {
//     player.pause();
//     centerPlayButton.style.display = "block";
// }

// function stopVideo () {
//     player.pause();
//     player.currentTime = 0;
//     centerPlayButton.style.display = "block";
//     player.load();
// }


// function showCenterPlay () {
//     centerPlayButton.style.display = "block";
// }

// function loadTimelineLength () {
//     timeline.max = player.duration;
// }

// function updateTimeline () {
//     timeline.value = player.currentTime;
// }

// function changeTimeline () {
//     player.currentTime = timeline.value;
// }

// function changeVolume () {
//     player.volume = volumeSlider.value;
// }

// function toggleFullScreen () {
//     if(document.fullscreenElement) {
//         document.exitFullscreen();
//     } else {
//         playerCon.requestFullscreen();
//     }
// }

// function showControls () {
//     videoControls.classList.remove('hide');
// }

// function hideControls () {
//     videoControls.classList.add('hide');
// }


// centerPlayButton.addEventListener("click", playVideo);
// playButton.addEventListener("click", playVideo);
// player.addEventListener("ended", showCenterPlay)
// pauseButton.addEventListener("click", pauseVideo);
// stopButton.addEventListener("click", stopVideo);
// volumeSlider.addEventListener("change", changeVolume);
// player.addEventListener("loadedmetadata", loadTimelineLength);
// player.addEventListener("timeupdate", updateTimeline)
// timeline.addEventListener("change", changeTimeline)
// fullScreen.addEventListener("click", toggleFullScreen);
// videoControls.addEventListener("mouseenter", showControls);
// videoControls.addEventListener("mouseleave", hideControls);
// player.addEventListener("mouseenter", showControls);
// player.addEventListener("mouseleave", hideControls);
// }


// // work gallery slide
// carousel = function(id) {
// const container = document.querySelector(id + '.work-gallery-con');
// if (!container) return;
//   const workCards = container.querySelectorAll('.work-card');
//   const preBtn = container.querySelector('.previous');
//   const nextBtn = container.querySelector('.next');

// let currentIndex = 0;

// function updateCard () {
//     workCards.forEach ((card) => {
//          card.style.display = "none";
//     });
    
//     workCards[currentIndex].style.display = "block";
// }

// function nextCard () {
//     if(currentIndex === workCards.length - 1) {
//         currentIndex = 0;
//     }
//     else {
//         currentIndex++;
//     };

//     updateCard();
// }

// function preCard () {
//     if(currentIndex === 0) {
//         currentIndex = workCards.length - 1;
//     }
//     else {
//         currentIndex--;
//     };

//     updateCard();
// }

// nextBtn.addEventListener("click", nextCard);
// preBtn.addEventListener("click", preCard);

// updateCard();
// }

// carousel('#elin');
// carousel('#loop');
// carousel('#zima');
// carousel('#kids');

// //gsap animation
// // ----------------- home ---------------------------

// const mySkills = document.querySelector("#my-skills");
// if (mySkills) {
//     gsap.from(mySkills, {
//       opacity: 0,
//       y: 50,
//       ease: "power1.out",
//       duration: 0.5,
//         scrollTrigger: {
//             trigger: mySkills,
//             start: "top 80%",
//             end: "top 80%"
//         }
//     })
// }

// const skills = document.querySelectorAll("#my-skills .skill");
// if (skills.length > 0) {
//     gsap.from(skills, {
//       opacity: 0,
//       y: 100,
//       ease: "power1.out",
//       stagger: 0.7,
//       duration: 0.5,
//         scrollTrigger: {
//             trigger: "#my-skills",
//             start: "top 40%",
//             end: "top 50%",
//             scrub: 2
//         }
//     })
// }

// const video = document.querySelector("video");
// if (video) {
//     gsap.from(video, {
//       opacity: 0,
//       y: 80,
//       ease: "power1.out",
//       stagger: 0.7,
//       duration: 0.5,
//         scrollTrigger: {
//             trigger: video,
//             start: "top 90%",
//             end: "top 50%",
//             scrub: 0.5
//         }
//     })
// }

// const workCon = document.querySelectorAll(".work-con");
// if (workCon.length > 0) {
//     gsap.from(workCon, {
//       duration: 0.5,
//       opacity: 0,
//       scale: 0,
//       stagger: 0.3,
//       ease: "back.out(1.5)",
//       scrollTrigger: {
//             trigger: "#work-show",
//             start: "top 30%",
//             end: "top 50%",
//             scrub: 2
//         }
//     });}


// const aboutCard = document.querySelector("#about-card");
// if (aboutCard) {
//     gsap.from(aboutCard, {
//       opacity: 0,
//       x: -50,
//       ease: "power1.out",
//       stagger: 0.7,
//       duration: 0.5,
//         scrollTrigger: {
//             trigger: aboutCard,
//             start: "top 60%",
//             end: "top 50%",
//             scrub: 0.5
//         }
//     })
// }


//     // ---------------- about --------------

// const aboutTitle = document.querySelector("#title");
// if (aboutTitle) {
//     gsap.from(aboutTitle, {
//         opacity: 0,
//         y: 100,
//         ease: "power1.out",
//       duration: 1
//     })
// }

// const aboutImg = document.querySelector("#about-img");
// if (aboutImg) {
//     gsap.from(aboutImg, {
//         opacity: 0,
//         x: -100,
//         ease: "power1.out",
//       duration: 1
//     })
// }

// const aboutText = document.querySelector("#about-text");
// if (aboutText) {
//     gsap.from(aboutText, {
//         opacity: 0,
//         x: 100,
//         ease: "power1.out",
//       duration: 1
//     })
// }


//   // ------------ contact --------------
//   const contact = document.querySelector("#contact");
//   if (contact) {
//   gsap.from(contact, {
//       opacity: 0,
//       x: -100,
//       ease: "power1.out",
//       stagger: 0.7,
//       duration: 1
//     })
// }


// // ------------- case study ------------------------
// const intro = document.querySelector("#intro");
// if (intro) {
//     gsap.from(intro, {
//       opacity: 0,
//       x: -50,
//       ease: "power1.out",
//       stagger: 0.7,
//       duration: 1
//     })
// }

// const projectImg = document.querySelectorAll(".project-imags");
// if (projectImg.length > 0) {
//     projectImg.forEach((img) => {
//     gsap.from(img, {
//       opacity: 0,
//       x: -50,
//       ease: "power1.out",
//       duration: 1,
//         scrollTrigger: {
//             trigger: img,
//             start: "top 60%",
//             end: "top 50%",
//             scrub: 1
//         }
//     })
// });
// }

// const challenge = document.querySelector("#challenges");
// if (challenge) {
//     gsap.from(challenge, {
//       opacity: 0,
//       x: -50,
//       ease: "power1.out",
//       duration: 1,
//         scrollTrigger: {
//             trigger: challenge,
//             start: "top 60%",
//             end: "top 50%",
//             scrub: 1
//         }
//     })
// }

// // ---------- header --------------
// gsap.from("header", {
//       opacity: 0,
//       y: -10,
//       ease: "power1.out",
//       stagger: 0.7,
//       duration: 1
//     })

// // ---------- footer ---------------
// gsap.from("footer", {
//       opacity: 0,
//       y: 50,
//       ease: "power1.out",
//       stagger: 0.7,
//       duration: 1,
//       scrollTrigger: {
//             trigger: "footer",
//             start: "top 90%",
//             end: "top 50%",
//             scrub: 1
//         }
//     })


// })();