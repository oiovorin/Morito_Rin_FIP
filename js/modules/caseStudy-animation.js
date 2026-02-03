export function caseStudyAnimation () {
    const intro = document.querySelector("#intro");
if (intro) {
    gsap.from(intro, {
      opacity: 0,
      x: -50,
      ease: "power1.out",
      stagger: 0.7,
      duration: 1
    })
}

const projectImg = document.querySelectorAll(".project-imags");
if (projectImg.length > 0) {
    projectImg.forEach((img) => {
    gsap.from(img, {
      opacity: 0,
      x: -50,
      ease: "power1.out",
      duration: 1,
        scrollTrigger: {
            trigger: img,
            start: "top 60%",
            end: "top 50%",
            scrub: 1
        }
    })
});
}

const challenge = document.querySelector("#challenges");
if (challenge) {
    gsap.from(challenge, {
      opacity: 0,
      x: -50,
      ease: "power1.out",
      duration: 1,
        scrollTrigger: {
            trigger: challenge,
            start: "top 60%",
            end: "top 50%",
            scrub: 1
        }
    })
}
}