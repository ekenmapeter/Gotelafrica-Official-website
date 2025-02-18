












// document.getElementById("menu-icon").addEventListener("click", function() {
//     var navLinks = document.getElementById("nav-links");
//     navLinks.classList.toggle("active");
// });

//
const testimonials = document.querySelector('.testimonial-container');
const prevButton = document.querySelector('.prev');
const nextButton = document.querySelector('.next');
let index = 0;

prevButton.addEventListener('click', () => {
    if (index > 0) {
        index--;
    } else {
        index = testimonials.children.length - 1;
    }
    updateSlider();
});

nextButton.addEventListener('click', () => {
    if (index < testimonials.children.length - 1) {
        index++;
    } else {
        index = 0;
    }
    updateSlider();
});

function updateSlider() {
    const width = testimonials.children[index].offsetWidth;
    testimonials.style.transform = `translateX(${-index * (width + 60)}px)`;
}
