export function contactAnimation () {
      const contact = document.querySelector("#contact");
  if (contact) {
  gsap.from(contact, {
      opacity: 0,
      x: -100,
      ease: "power1.out",
      stagger: 0.7,
      duration: 1
    })
}
}