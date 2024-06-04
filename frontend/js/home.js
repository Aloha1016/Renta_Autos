document.addEventListener('DOMContentLoaded', function () {
    if (!localStorage.getItem('userId')) {
        window.location.href = '../frontend/index.html'
    }
    console.log('Page Loaded');
});
