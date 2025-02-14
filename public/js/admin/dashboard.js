let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute("content");

fetch("/your-endpoint", {
    method: "POST",
    headers: {
        "X-CSRF-TOKEN": csrfToken,
        "Content-Type": "application/json"
    },
    body: JSON.stringify({ key: "value" })
});