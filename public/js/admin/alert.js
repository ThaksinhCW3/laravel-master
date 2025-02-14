setTimeout(function() {
    var alertElement = document.getElementById('success-alert');
    if (alertElement) {
        alertElement.style.display = 'none'; // Or alertElement.remove(); to completely remove it from the DOM
    }
}, 5000); // 3000 milliseconds = 3 seconds