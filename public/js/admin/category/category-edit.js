function previewImage(event) {
    const file = event.target.files[0];
    const previewContainer = document.getElementById('imagePreviewContainer');
    const previewImage = document.getElementById('preview');

    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            if (previewImage) {
                // If an image exists, update its `src`
                previewImage.src = e.target.result;
            } else {
                // If no image exists, replace the empty div with an image
                previewContainer.innerHTML = `<img id="preview" src="${e.target.result}" alt="Preview Image" width="250" height="auto">`;
            }
        };
        reader.readAsDataURL(file);
    }
}
