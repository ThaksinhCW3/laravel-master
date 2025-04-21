document.querySelectorAll('.deleteBtn').forEach(button => {
    button.addEventListener('click', function(event) {
        event.preventDefault(); // Prevent default action

        let form = button.closest('form'); // Get the form element
        let urlToRedirect = form.getAttribute('action');
        let product = form.dataset.name || "Product"; // Default if no name is available

        Swal.fire({
            title: `Do you want to delete this product "${product}"?`,
            text: "This action cannot be undone!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#6c757d",
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "Cancel"
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit(); // Submit the form only if confirmed
            }
        });
    });
});