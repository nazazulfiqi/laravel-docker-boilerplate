window.deletePermission = function(id) {
    const form = document.getElementById("deleteForm");
    form.action = `/permissions/${id}`;

    // buka modal seperti biasa
    const modal = document.getElementById("deleteConfirmModal");
    modal.classList.remove("hidden");

    requestAnimationFrame(() => {
        modal.classList.remove("opacity-0");
        modal.querySelector("div").classList.remove("scale-95", "opacity-0");
    });
};