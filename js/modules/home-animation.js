export function homeAnimation () {
    const mySkills = document.querySelector("#my-skills");
if (mySkills) {
    gsap.from(mySkills, {
      opacity: 0,
      y: 50,
      ease: "power1.out",
      duration: 0.5,
        scrollTrigger: {
            trigger: mySkills,
            start: "top 80%",
            end: "top 80%"
        }
    })
}

const skills = document.querySelectorAll("#my-skills .skill");
if (skills.length > 0) {
    gsap.from(skills, {
      opacity: 0,
      y: 100,
      ease: "power1.out",
      stagger: 0.7,
      duration: 0.5,
        scrollTrigger: {
            trigger: "#my-skills",
            start: "top 40%",
            end: "top 50%",
            scrub: 2
        }
    })
}

const video = document.querySelector("video");
if (video) {
    gsap.from(video, {
      opacity: 0,
      y: 80,
      ease: "power1.out",
      stagger: 0.7,
      duration: 0.5,
        scrollTrigger: {
            trigger: video,
            start: "top 90%",
            end: "top 50%",
            scrub: 0.5
        }
    })
}

const workCon = document.querySelectorAll(".work-con");
if (workCon.length > 0) {
    gsap.from(workCon, {
      duration: 0.5,
      opacity: 0,
      scale: 0,
      stagger: 0.3,
      ease: "back.out(1.5)",
      scrollTrigger: {
            trigger: "#work-show",
            start: "top 30%",
            end: "top 50%",
            scrub: 2
        }
    });}


const aboutCard = document.querySelector("#about-card");
if (aboutCard) {
    gsap.from(aboutCard, {
      opacity: 0,
      x: -50,
      ease: "power1.out",
      stagger: 0.7,
      duration: 0.5,
        scrollTrigger: {
            trigger: aboutCard,
            start: "top 60%",
            end: "top 50%",
            scrub: 0.5
        }
    })
}

}