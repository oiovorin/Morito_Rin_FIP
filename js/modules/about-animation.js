export function aboutAnimation () {
    const aboutTitle = document.querySelector("#title");
    if (aboutTitle) {
        gsap.from(aboutTitle, {
            opacity: 0,
            y: 100,
            ease: "power1.out",
        duration: 1
        })
    }

const aboutImg = document.querySelector("#about-img");
if (aboutImg) {
    gsap.from(aboutImg, {
        opacity: 0,
        x: -100,
        ease: "power1.out",
      duration: 1
    })
}

const aboutText = document.querySelector("#about-text");
if (aboutText) {
    gsap.from(aboutText, {
        opacity: 0,
        x: 100,
        ease: "power1.out",
      duration: 1
    })
}
}