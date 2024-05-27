function changeImage(src) {
    document.getElementById('main-image').src = src;
}

function bookNow() {
    const startDate = new Date(document.getElementById('start-date').value);
    const endDate = new Date(document.getElementById('end-date').value);
    const errorMessage = document.getElementById('error-message');

    if (endDate - startDate >= 3 * 24 * 60 * 60 * 1000) {
        alert('Booking successful!');
        errorMessage.style.display = 'none';
    } else {
        errorMessage.style.display = 'block';
    }
}
