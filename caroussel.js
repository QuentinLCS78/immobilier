let slideIndex = 0;

window.onload = function() {
    showSlides(slideIndex); // Initialisation du carrousel lors du chargement de la page
    setupKeyboardControls(); // Setup keyboard controls for accessibility
};

function moveSlide(n) {
    showSlides(slideIndex += n);
}

function showSlides(n) {
    let slides = document.getElementsByClassName("slides")[0].getElementsByTagName("img");
    if (n >= slides.length) slideIndex = 0;
    if (n < 0) slideIndex = slides.length - 1;
    
    Array.from(slides).forEach((img, index) => {
        img.style.display = index === slideIndex ? "block" : "none";
    });
}

function setupKeyboardControls() {
    document.addEventListener('keydown', function(event) {
        if (event.key === 'ArrowLeft') {
            moveSlide(-1); // Move to the previous slide
        } else if (event.key === 'ArrowRight') {
            moveSlide(1); // Move to the next slide
        }
    });
}
