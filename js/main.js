(function() {
// header navigation close
const hamburger = document.querySelector('#hamburger');
const navLinks = document.querySelectorAll('#header-nav nav ul li a');

navLinks.forEach(link => {
  link.addEventListener('click', () => {
    hamburger.checked = false;
  });
})

// video
const playerCon = document.querySelector("#player-container");
const player = document.querySelector("video");
const videoControls = document.querySelector("#video-controls");
const centerPlayButton = document.querySelector("#center-play-button");
const playButton = document.querySelector("#play-button");
const pauseButton = document.querySelector("#pause-button");
const stopButton = document.querySelector("#stop-button");
const volumeSlider = document.querySelector("#change-vol");
const fullScreen = document.querySelector("#full-screen");



player.controls = false;
videoControls.classList.remove('hidden');

function playVideo() {
    player.play();
    centerPlayButton.style.display = "none";
}

function pauseVideo () {
    player.pause();
    centerPlayButton.style.display = "block";
}

function stopVideo () {
    player.pause();
    player.currentTime = 0;
    centerPlayButton.style.display = "block";
}


function showCenterPlay () {
    centerPlayButton.style.display = "block";
}

function changeVolume () {
    player.volume = volumeSlider.value;
}

function toggleFullScreen () {
    if(document.fullscreenElement) {
        document.exitFullscreen();
    } else {
        playerCon.requestFullscreen();
    }
}

function showControls () {
    videoControls.classList.remove('hide');
}

function hideControls () {
    videoControls.classList.add('hide');
}

centerPlayButton.addEventListener("click", playVideo);
playButton.addEventListener("click", playVideo);
player.addEventListener("ended", showCenterPlay)
pauseButton.addEventListener("click", pauseVideo);
stopButton.addEventListener("click", stopVideo);
volumeSlider.addEventListener("change", changeVolume);
fullScreen.addEventListener("click", toggleFullScreen);
videoControls.addEventListener("mouseenter", showControls);
videoControls.addEventListener("mouseleave", hideControls);
player.addEventListener("mouseenter", showControls);
player.addEventListener("mouseleave", hideControls);


// work gallery slide
carousel = function(id) {
const container = document.querySelector(id + '.work-gallery-con');
  const workCards = container.querySelectorAll('.work-card');
  const preBtn = container.querySelector('.previous');
  const nextBtn = container.querySelector('.next');

let currentIndex = 0;

function updateCard () {
    workCards.forEach ((card) => {
         card.style.display = "none";
    });
    
    workCards[currentIndex].style.display = "block";
    console.log("called");
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


})();