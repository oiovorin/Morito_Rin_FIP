gsap.registerPlugin(ScrollTrigger);
// home page 
import { header } from "./modules/header.js";
import { workGallery } from "./modules/home.js";
import { homeAnimation } from "./modules/home-animation.js";
import { videoPlayer } from "./modules/videoplayer.js";
import { footer } from "./modules/footer.js";


// aboout page
import { aboutAnimation } from "./modules/about-animation.js";


// contat page
import { contactAnimation } from "./modules/contact-animation.js";
import { contactform } from "./modules/contactform.js";


// case study
import { caseStudyAnimation } from "./modules/caseStudy-animation.js";

if(document.body.dataset.page === "home") {
  header();
workGallery();
homeAnimation();
videoPlayer();
footer();
  } else if(document.body.dataset.page === "contact") {
    header();
  contactAnimation();
  contactform();
  footer();
} else if(document.body.dataset.page === "about") {
    header();
    aboutAnimation();
    footer();
} else if(document.body.dataset.page === "caseStudy") {
    header();
    caseStudyAnimation();
    videoPlayer();
    footer();
}