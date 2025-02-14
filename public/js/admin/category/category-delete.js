document.querySelectorAll('.deleteBtn').forEach(button => {
    button.addEventListener('click', function(event) {
        event.preventDefault(); // Prevent default action

        let form = button.closest('form'); // Get the form element
        let urlToRedirect = form.getAttribute('action');
        let category = form.dataset.name || "this category"; // Default if no name is available

        Swal.fire({
            title: `Do you want to delete the category "${category}"?`,
            text: "This action cannot be undone!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "Cancel"
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit(); // Submit the form only if confirmed
            }
        });
    });
});