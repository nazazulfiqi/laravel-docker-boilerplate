import { apiFetch } from "../../api/fetch";
import { renderPagination } from "../../components/pagination";
import { formatDate } from "../../utils/formatDate";

document.addEventListener('DOMContentLoaded', () => {

    const apiUrl = "/api/permissions/filter";
    let currentPage = 1;
    let search = "";

    const tableBody = document.querySelector("tbody");
    const searchBox = document.getElementById("searchBox");

    async function loadData(page = 1) {
        currentPage = page;

        const url = `${apiUrl}?name=${encodeURIComponent(search)}&page=${page}&per_page=10`;

        const result = await apiFetch(url);
        if (!result || !result.data) return;

        renderTable(result.data);
        renderPagination(result.meta, loadData);
    }

    function renderTable(items) {
        tableBody.innerHTML = items.map(p => `
            <tr class="hover:bg-gray-50 transition">
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">${p.name}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">${formatDate(p.created_at)}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">${formatDate(p.updated_at)}</td>
              <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center space-x-2">
                                <a href="{{ route('users.edit', 1) }}" class="p-2 hover:bg-blue-50 text-blue-600 rounded-lg transition">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                                </a> 
                                <button class="p-2 hover:bg-red-50 text-red-600 rounded-lg transition">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                    </svg>
                                </button>
                            </div>
                        </td>
            </tr>
        `).join("");
    }

    searchBox.addEventListener("input", (e) => {
        search = e.target.value;
        loadData(1);
    });

    loadData();
});
