document.getElementById("imageInput").addEventListener("change", function(event) {
    let file = event.target.files[0];
    let previewContainer = document.getElementById("imagePreviewContainer");

    if (file) {
        let reader = new FileReader();
        reader.onload = function(e) {
            previewContainer.innerHTML = `<img src="${e.target.result}" 
                                           style="max-width: 100%; max-height: 100%; object-fit: contain;">`;
        };
        reader.readAsDataURL(file);
    } else {
        previewContainer.innerHTML = "Empty"; // Reset when no file is selected
    }
});