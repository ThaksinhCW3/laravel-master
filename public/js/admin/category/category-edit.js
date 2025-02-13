document.addEventListener("DOMContentLoaded", function () {
    let toggleSwitches = document.querySelectorAll(".toggle-status");

    toggleSwitches.forEach((toggleSwitch) => {
        toggleSwitch.addEventListener("change", function () {
            let categoryId = this.dataset.id;
            let statusLabel = this.closest(".form-check").querySelector(".status-label");

            fetch(`/admin/category/toggle-status/${categoryId}`, {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({})
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    statusLabel.textContent = data.status ? "Published" : "Unpublished";
                } else {
                    alert("Failed to update status.");
                }
            })
            .catch(error => console.error("Error:", error));
        });
    });
});
