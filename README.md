<p align="center">
  <h1 align="center">🎓 LearnHub</h1>
  <p align="center">A Laravel-based learning platform</p>
</p>

---

## 📌 About LearnHub

LearnHub is a web application built with Laravel that allows users to browse courses, enroll, and manage learning content. It includes an admin panel for managing courses, users, and enrollments.

---

## 🚀 Features

* 👨‍🎓 User authentication (login/register)
* 📚 Course management (Admin)
* 🧑‍🏫 Teacher management
* 📝 Enrollment system
* ⭐ Course reviews
* 📊 Admin dashboard

---

## 🛠️ Tech Stack

* PHP (Laravel)
* MySQL
* Blade
* Bootstrap

---

## ⚙️ Requirements

Make sure you have installed:

* PHP >= 8.1
* Composer
* MySQL / MariaDB
* Node.js & npm
* XAMPP / Apache (or any server)

---

## 📥 Installation Guide (Step-by-Step)

### 1️⃣ Clone the project

```bash
git clone https://github.com/your-username/learnhub.git
cd learnhub
```

---

### 2️⃣ Install PHP dependencies

```bash
composer install
```

---

### 3️⃣ Install frontend dependencies

```bash
npm install
npm run build
```

---

### 4️⃣ Create environment file

```bash
cp .env.example .env
```

---

### 5️⃣ Configure database

Open `.env` and update:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=learnhub
DB_USERNAME=root
DB_PASSWORD=
```

👉 Create a database manually in phpMyAdmin called:

```
learnhub
```

---

### 6️⃣ Generate app key

```bash
php artisan key:generate
```

---

### 7️⃣ Run migrations (VERY IMPORTANT ⚠️)

```bash
php artisan migrate
```

👉 This will create all tables (courses, users, enrollments, reviews...)

---

### 8️⃣ (Optional) Seed database

If you have seeders:

```bash
php artisan db:seed
```

---

### 9️⃣ Run the project

```bash
php artisan serve
```

Open in browser:

```
http://127.0.0.1:8000
```

---

## 🔐 Admin Access (Optional)

If you created admin manually:

* Email: [admin@example.com](mailto:admin@example.com)
* Password: password

(Or create your own user and set role in database)

---

## ⚠️ Important Notes

* ❌ The database is NOT included in this repository
* ✅ You MUST run migrations
* ✅ Make sure MySQL is running (XAMPP)
* ✅ Check `.env` if connection fails

---

## 🧠 Common Errors & Fixes

### ❌ phpMyAdmin / MySQL errors

✔️ Make sure MySQL is running in XAMPP

### ❌ Class not found / vendor errors

```bash
composer install
```

### ❌ App key missing

```bash
php artisan key:generate
```

### ❌ Tables not found

```bash
php artisan migrate
```

---


## 🤝 Contributing

Feel free to fork and improve the project.

---

## 👤 Author

Jawad
GitHub: https://github.com/your-username

---
