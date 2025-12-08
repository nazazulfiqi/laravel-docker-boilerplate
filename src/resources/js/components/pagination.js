export function renderPagination(meta, onPageClick) {
    const wrapper = document.querySelector('.pagination-buttons');
    const info = document.querySelector('.pagination-info');

    wrapper.innerHTML = "";
    info.textContent = `Showing page ${meta.current_page} of ${meta.last_page} — Total ${meta.total}`;

    const current = meta.current_page;
    const last = meta.last_page;

    const createBtn = (label, page, opts = {}) => {
        const btn = document.createElement("button");
        btn.textContent = label;

        btn.className =
            "px-3 py-2 rounded-lg " +
            (opts.active ? "bg-blue-600 text-white" :
                opts.disabled ? "border opacity-50 cursor-not-allowed" :
                "border hover:bg-gray-50 cursor-pointer");

        if (!opts.active && !opts.disabled) {
            btn.onclick = () => onPageClick(page);
        }

        wrapper.appendChild(btn);
    };

    const createDots = () => {
        const dot = document.createElement("span");
        dot.textContent = "...";
        dot.className = "px-2 text-gray-500";
        wrapper.appendChild(dot);
    };

    // Previous
    createBtn("Previous", current - 1, { disabled: !meta.prev_page_url });

    // Always show 1
    createBtn(1, 1, { active: current === 1 });

    // Left dots
    if (current > 3) createDots();

    // Middle pages
    [current - 1, current, current + 1].forEach(p => {
        if (p > 1 && p < last) {
            createBtn(p, p, { active: p === current });
        }
    });

    // Right dots
    if (current < last - 2) createDots();

    // Last page
    if (last > 1) createBtn(last, last, { active: current === last });

    // Next
    createBtn("Next", current + 1, { disabled: !meta.next_page_url });
}
