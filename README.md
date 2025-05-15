# 🛒 Laravel Online Shop for Coding Resources

This is a Laravel-based web application designed to sell digital products related to programming and development. Whether it's eBooks, source code archives (`.zip`), WordPress plugins, video courses, or any other type of digital file, this platform makes it easy to manage and deliver your products to customers securely and efficiently.

## ✨ Features

- 🔐 **OTP Authentication** via SMS or Email for secure login  
- 📩 **Email & SMS Notifications** for user interactions (e.g., registration, purchases)  
- 📦 **Sell Any File Format**: `.zip`, `.pdf`, `.docx`, `.rar`, and more  
- 📚 **Support for Courses, Plugins, Code Snippets, and eBooks**  
- 🧑‍💼 **Admin Panel** to manage users, orders, files, and product listings  
- 🛍️ **User-Friendly Product Pages** with instant download access after purchase  
- 💳 **Secure Checkout System** (payment integration can be extended)  

## 🛠️ Tech Stack

- **Laravel** (Latest version)  
- **MySQL / SQLite**  
- **Bootstrap** (or custom CSS)  
- **OTP** via Laravel Notification System  
- **Email** via Laravel Mail  
- **SMS Integration** via supported gateways (e.g., Twilio, Kavenegar, etc.)

## 📂 Project Structure Highlights

- `app/Models/` – Custom models for Users, Products, Orders, etc.  
- `resources/views/` – Blade templates for frontend and admin panel  
- `routes/web.php` – Organized routes for customer and admin use  
- `app/Http/Controllers/` – Clean separation between user and admin logic


## Installation
1. Clone the project
2. Navigate to the project's root directory using terminal
3. Create `.env` file - `cp .env.example .env`
4. Config `.env` file mysql & mail setup & SMS service.
5. Execute `composer install`
6. Execute `npm install`
7. Set application key - `php artisan key:generate --ansi`
8. Execute migrations - `php artisan migrate`
9. Run queue - `php artisan queue:listen`
10. Start Artisan server - `php artisan serve`

## Note
1. You can access the admin panel by route localhost/admin.
2. You should set some database settings manual like fill the menus and banners tables for home page view and set user to be admin.