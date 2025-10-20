// work gallery slide
const container = document.querySelector('#work-gallery-con');
const workCards = document.querySelectorAll('.work-card');
const preBtn = document.querySelector('#previous');
const nextBtn = document.querySelector('#next');

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