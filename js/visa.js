const slider = document.querySelector(".visa-slider");
const sliderTrack = document.querySelector(".visa-slider-track");


let isPressed = false;
let cursorX;

slider.addEventListener("mousedown", (event) => {
    isPressed = true;
    cursorX = event.offsetX - sliderTrack.offsetLeft;
})

window.addEventListener("mouseup", () =>{
    isPressed = false;
})

slider.addEventListener("mousemove", (event) =>{
    if(!isPressed) return;
    event.preventDefault();
    sliderTrack.style.left = `${event.offsetX - cursorX}px`;
    boundaries();
})

function boundaries(){
    if(parseInt(sliderTrack.style.left) > 0){
        sliderTrack.style.left = 0 + 'px';
    } else if(parseInt(sliderTrack.style.left) < -1960){
        sliderTrack.style.left = -1960 + 'px';
    }
}