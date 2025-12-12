document.addEventListener("DOMContentLoaded", () => {

    // OPEN modal
    document.querySelectorAll("[data-open-modal]").forEach(btn => {
        btn.addEventListener("click", () => {
            const modal = document.getElementById(btn.dataset.openModal);
            if (!modal) return;

            modal.classList.remove("hidden");

            // Animate fade-in
            requestAnimationFrame(() => {
                modal.classList.remove("opacity-0");
                modal.querySelector("div").classList.remove("scale-95", "opacity-0");
            });
        });
    });

    // CLOSE modal
    document.addEventListener("click", (event) => {
        if (event.target.classList.contains("cancel-btn")) {
            const modal = event.target.closest(".fixed");
            if (!modal) return;

            // Animate fade-out
            modal.classList.add("opacity-0");
            modal.querySelector("div").classList.add("scale-95", "opacity-0");

            setTimeout(() => modal.classList.add("hidden"), 300); // match duration
        }
    });

    // Submit + Spinner
    document.addEventListener("click", (event) => {
        if (event.target.classList.contains("confirm-btn")) {

            const btn = event.target;
            const formId = btn.dataset.form;
            const form = document.getElementById(formId);
            if (!form) return;

            // =====================================
            // 🔥 Kunci lebar tombol agar tidak berubah
            // =====================================
            const currentWidth = btn.offsetWidth;
            btn.style.width = currentWidth + "px";

            btn.disabled = true;

            // Ganti teks dengan spinner
            btn.innerHTML = `
                <svg class="w-5 h-5 animate-spin mx-auto" viewBox="0 0 50 50">
                    <circle class="opacity-25" cx="25" cy="25" r="20"
                        stroke="currentColor" stroke-width="5" fill="none" />
                    <circle class="opacity-75" cx="25" cy="25" r="20"
                        stroke="currentColor" stroke-width="5"
                        stroke-linecap="round" fill="none"
                        stroke-dasharray="31.4 188.4" />
                </svg>
            `;

            // Disable cancel button juga
            const modal = btn.closest(".fixed");
            modal?.querySelector(".cancel-btn")?.setAttribute("disabled", true);

            form.submit();
        }
    });

});
