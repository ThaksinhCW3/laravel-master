document.querySelectorAll('.changeStatusBtn').forEach(button => {
    button.addEventListener('click', function(event) {
        event.preventDefault(); // Prevent default link behavior

        let form = button.closest('form'); // Get the form element
        let productName = form.dataset.name || "Product";
        let currentStatus = button.dataset.status;
        let actionText = currentStatus === 'publish' ? 'Publish' : 'Unpublish';
        let confirmButtonColor = currentStatus === 'publish' ? '#008000' : '#dc3545'; // Green for publish, red for unpublish
        let confirmButtonText = currentStatus === 'publish' ? 'Publish' : 'Unpublish';
        let icon = 'question';
        let titleText = `${actionText} this product "${productName}"?`;
        let text = 'Do you wish to proceed?';

        Swal.fire({
            title: titleText,
            text: text,
            icon: icon,
            showCancelButton: true,
            confirmButtonColor: confirmButtonColor,
            cancelButtonColor: '#6c757d', // Standard gray cancel button
            confirmButtonText: confirmButtonText,
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit(); // Submit the form only if confirmed
            }
        });
    });
});