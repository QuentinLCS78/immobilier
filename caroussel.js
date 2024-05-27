let slideIndex = 0;
window.onload = function() {
    showSlides(slideIndex); // Initialisation du carrousel lors du chargement de la page
};

function moveSlide(n) {
    showSlides(slideIndex += n);
}

function showSlides(n) {
    let slides = document.getElementsByClassName("slides")[0].getElementsByTagName("img");
    if (n >= slides.length) {
        slideIndex = 0;
    } else if (n < 0) {
        slideIndex = slides.length - 1;
    }
    for (let i = 0; i < slides.length; i++) {
        slides[i].style.display = "none"; // Cache toutes les images
    }
    slides[slideIndex].style.display = "block"; // Affiche l'image actuelle
}
