document.addEventListener('DOMContentLoaded', () => {
    let currentIndex = 0;
    const images = document.querySelectorAll('.carousel-image');

    function showNextImage() {
        images[currentIndex].classList.remove('active');
        currentIndex = (currentIndex + 1) % images.length;
        images[currentIndex].classList.add('active');
    }

    setInterval(showNextImage, 5000);
});
