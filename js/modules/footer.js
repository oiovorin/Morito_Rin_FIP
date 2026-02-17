export function footer () {
    gsap.from("footer", {
      opacity: 0,
      y: 50,
      ease: "power1.out",
      stagger: 0.7,
      duration: 1,
      scrollTrigger: {
            trigger: "footer",
            start: "top 90%",
            end: "top 50%",
            scrub: 1
        }
    })
}