document.addEventListener('DOMContentLoaded', () => {
    if (localStorage.getItem('userId')) {
        window.location.href = '../frontend/home.html'
    }
});
