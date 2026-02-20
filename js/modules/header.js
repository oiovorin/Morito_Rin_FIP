export function header() {
    const hamburger = document.querySelector('#hamburger');
    const navLinks = document.querySelectorAll('#header-nav nav ul li a');

    navLinks.forEach(link => {
    link.addEventListener('click', () => {
        hamburger.checked = false;
    });
    })

    gsap.from("header", {
      opacity: 0,
      y: -10,
      ease: "power1.out",
      stagger: 0.7,
      duration: 1
    })
}