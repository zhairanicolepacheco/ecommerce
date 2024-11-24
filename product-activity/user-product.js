const imgs = document.getElementById('imgs');
const img = document.querySelectorAll(".pics");

let index = 0;
let interval = setInterval(run, 5000);

function run () {
    index++;
    changeImage ();
}

function changeImage () {
    if(index > img.length - 1) {
        index = 0;
    } else if (index < 0) {
        index = img.length - 1;
    }
    
    imgs.style.transform = `translateX(${-index*26}vw)`;	
}

function resetInterval() {
    clearInterval();
    interval = setInterval(run, 5000);
}
