    // Select the input and button
    const searchInput = document.getElementById('search-input');
    const searchButton = document.getElementById('search-button');

    // Add event listener to the input to listen for 'Enter' key press
    searchInput.addEventListener('keypress', function(event) {
        if (event.key === 'Enter') {
            searchButton.click();  // Simulate a click on the search button
        }
    });

    // Add event listener to the search button for the click event
    searchButton.addEventListener('click', function() {
        const query = searchInput.value;  // Get the search input value
        // Here you can handle the search logic, e.g., redirect or make an API request
        window.location.href = '/search?query=' + encodeURIComponent(query); // Example redirect
    });