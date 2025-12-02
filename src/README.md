# 🚀 Laravel Docker Boilerplate

## Overview

This project is a Laravel development environment using Docker and WSL Ubuntu. It includes:

* 🐘 PHP 8.3 (FPM)
* 🌐 Nginx
* 🗄️ MySQL 8.0
* 🧰 Redis
* 🟢 Node 20 (for Vite / frontend tooling)
* 📦 Composer

The project supports **development** and **production** setups.

---

## 🛠️ Tech Stack

* **Backend:** PHP 8.3 + Laravel 12
* **Frontend:** Node.js 20 + Vite + TailwindCSS (optional)
* **Database:** MySQL 8.0
* **Cache / Queue:** Redis
* **Web Server:** Nginx
* **OS:** WSL Ubuntu
* **Containerization:** Docker / Docker Compose

---

## ✅ Prerequisites

* WSL 2 (Ubuntu)
* Docker Desktop with WSL2 backend
* VS Code with **Remote - WSL** extension
* Node.js (optional if running Node in container)
* Composer (optional if running in container)

> 💡 Tip: Semua file proyek sebaiknya berada di filesystem WSL (`/home/naza/projects/...`) untuk menghindari masalah permission.

---

## ⚡ Installation / Setup

### 1️⃣ Clone the project

```bash
cd ~/projects
git clone <repo_url> laravel-docker-boilerplate
cd laravel-docker-boilerplate
```

### 2️⃣ Build and start Docker containers (Development)

```bash
docker compose up -d --build
```

### 3️⃣ Enter PHP container and install Laravel

```bash
docker compose exec php bash
composer create-project laravel/laravel .
exit
```

### 4️⃣ Copy environment file

```bash
cd src
cp .env.example .env
```

Update `.env` values if needed (DB, Redis, APP_URL).

> 🔐 Permission tip: Biasanya tidak perlu `chmod`/`chown` jika file berada di WSL filesystem, karena Docker container akan menggunakan user yang sama dengan WSL (UID/GID 1000). Hanya gunakan `chmod 775 -R storage bootstrap/cache` jika terjadi error write permission.

### 5️⃣ Clear caches (important for CSS/Vite)

```bash
docker compose exec php php artisan view:clear
docker compose exec php php artisan cache:clear
```

### 6️⃣ Node / Vite setup (Development)

```bash
docker compose exec node npm install
docker compose exec node npm run dev
```

* Open browser: [http://localhost:8000](http://localhost:8000)
* Vite dev server: [http://localhost:5173](http://localhost:5173)

> Note: Make sure `.env` has:
>
> ```
> VITE_DEV_SERVER_URL=http://host.docker.internal:5173
> APP_URL=http://localhost:8000
> ```

### 7️⃣ MySQL & Redis

* 🗄️ MySQL: `localhost:3307`, user: `laravel`, password: `password`
* 🧰 Redis: `localhost:6379`

---

## 🚀 Production Build

1. Build Vite assets:

```bash
docker compose exec node npm run build
```

2. Use `docker-compose.prod.yml` (optional) for production containers without Node.

---

## 🔧 Artisan Commands (via Docker)

```bash
# Clear cache / view
docker compose exec php php artisan view:clear
docker compose exec php php artisan cache:clear

# Run migrations
docker compose exec php php artisan migrate

# Seed database
docker compose exec php php artisan db:seed
```

> Tip: You can create an alias for convenience:
>
> ```bash
> alias art="docker compose exec php php artisan"
> art migrate
> art cache:clear
> ```

---

## 📁 Folder Structure

```
laravel-docker-boilerplate/
├─ src/                # Laravel source code
├─ docker/             # Docker files
│  ├─ php/             # Dockerfile for PHP
│  ├─ nginx/           # Nginx config
│  └─ prod/            # Production Dockerfiles
├─ docker-compose.yml  # Development docker-compose
├─ docker-compose.prod.yml # Production docker-compose
└─ README.md
```

---

## 💡 Notes / Tips

* Always develop in **WSL filesystem** (`/home/naza/projects/...`) for best performance.
* Clear caches whenever changing Blade templates or `.env`.
* Node/Vite must run in **Node container** to avoid Windows permission issues.
* For production, use `npm run build` and serve static assets via Nginx.
* Use VS Code Remote WSL for best developer experience.

---

## 📚 References

* [Laravel Official Docs](https://laravel.com/docs)
* [Vite + Laravel](https://laravel.com/docs/12.x/vite)
* [Docker Docs](https://docs.docker.com/)
* [WSL Docs](https://learn.microsoft.com/en-us/windows/wsl/)
