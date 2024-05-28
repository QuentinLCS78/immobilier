let slideIndex = 0;

window.onload = function() {
    showSlides(slideIndex);
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

    Array.from(slides).forEach(slide => slide.style.display = "none");
    slides[slideIndex].style.display = "block";
}
