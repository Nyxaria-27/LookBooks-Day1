# Laravel Bookstore

A simple **Laravel Bookstore application** created as a practice project for **USK (Uji Sertifikasi Kompetensi)** preparation (Day 1/Day 2).

## 🎯 Purpose

* Practice and strengthen understanding of the **Laravel framework**.
* Get familiar with the workflow of building a CRUD (Create, Read, Update, Delete) application.
* Prepare for project implementation during the USK exam.

## ⚙️ Features

* User authentication (login & registration).
* Book management (CRUD).
* Book category management.
* Simple dashboard for admin and user.

## 🛠️ Tech Stack

* **Laravel** 10
* **MySQL** / MariaDB
* **Blade Template Engine**
* **Bootstrap** / **Tailwind CSS** (for styling, optional)

## 🚀 Installation

Follow the steps below to set up the project locally:

1. **Clone the repository**

   ```bash
   git clone https://github.com/your-username/laravel-bookstore.git
   cd laravel-bookstore
   ```

2. **Install dependencies**

   ```bash
   composer install
   pnpm install && pnpm run dev
   ```

3. **Configure environment file**

   ```bash
   cp .env.example .env
   ```

   Update the `.env` file with your database credentials. Example:

   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=bookstore
   DB_USERNAME=root
   DB_PASSWORD=
   ```

4. **Generate application key**

   ```bash
   php artisan key:generate
   ```

5. **Run migrations**

   ```bash
   php artisan migrate --seed
   ```

6. **Serve the application**

   ```bash
   php artisan serve
   ```

    ```bash
   pnpm artisan serve
   ```
   The app will be available at [http://localhost:8000](http://localhost:8000).

## 📚 Notes

* This project is for **training and exam preparation purposes only**.
* The structure and features are basic, intended for practice with Laravel fundamentals.

---

✨ Created as part of **USK 1-Day Training (Day 1/Day 2) Preparation**.
