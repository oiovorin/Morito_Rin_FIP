export function heroAnimation () {
    gsap.registerPlugin(ScrollTrigger);


    gsap.from(".animated-by-word", {
        duration: 1,
        autoAlpha: 0,
        stagger: .5
    });

    
    
}

export function workGallery () {
    function carousel(id) {
    const container = document.querySelector(id + '.work-gallery-con');
    if (!container) return;
    const workCards = container.querySelectorAll('.work-card');
    const preBtn = container.querySelector('.previous');
    const nextBtn = container.querySelector('.next');

    let currentIndex = 0;

    function updateCard () {
        workCards.forEach ((card) => {
            card.style.display = "none";
        });
        
        workCards[currentIndex].style.display = "block";
    }

    function nextCard () {
        if(currentIndex === workCards.length - 1) {
            currentIndex = 0;
        }
        else {
            currentIndex++;
        };

        updateCard();
    }

    function preCard () {
        if(currentIndex === 0) {
            currentIndex = workCards.length - 1;
        }
        else {
            currentIndex--;
        };

        updateCard();
    }

    nextBtn.addEventListener("click", nextCard);
    preBtn.addEventListener("click", preCard);

    updateCard();
    }

    carousel('#elin');
    carousel('#loop');
    carousel('#zima');
    carousel('#kids');
}