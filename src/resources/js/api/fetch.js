export async function apiFetch(url, options = {}) {
    const token = window.APP_JWT_TOKEN;

    const headers = options.headers || {};
    headers["Authorization"] = `Bearer ${token}`;
    headers["Accept"] = "application/json";

    // Jika multipart/form-data — jangan set Content-Type (biarkan browser)
    if (!(options.body instanceof FormData)) {
        headers["Content-Type"] = "application/json";
    }

    const response = await fetch(url, {
        ...options,
        headers
    });

    // Token expired → redirect
    if (response.status === 401) {
        window.location.href = "/";
        return;
    }

    return response.json();
}
