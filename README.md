# 📊 Filament 4 Admin Dashboard

An advanced **admin dashboard** built with **Laravel 12 + Filament 4**, showcasing custom CRUD resources, relation managers, dashboards, roles & permissions, and multi-tenancy.

This project demonstrates my expertise in **Filament 4** for building scalable, customizable admin panels for real-world applications.

---

## Features

### CRUD Resources

-   Custom forms with **tabs, sections, and wizards**
-   Table columns with **filters, search, badges, and bulk actions**

### Relationships

-   **BelongsTo**, **HasMany**, **BelongsToMany** with multi-select and relation managers

### Dashboard Widgets

-   Stats overview
-   Interactive charts
-   Custom data tables

### Look & Feel Customization

-   Custom **themes, icons, badges**
-   **Multilingual support**

### Roles & Permissions

-   Restrict access to **resources and actions**
-   Role-based dashboards (Admin, Manager, User)

### Multi-Tenancy (optional)

-   Separate data for multiple organizations

---

## Screenshots

| Dashboard                               | CRUD Table                      | Form with Tabs                | Roles & Permissions             |
| --------------------------------------- | ------------------------------- | ----------------------------- | ------------------------------- |
| ![Dashboard](screenshots/dashboard.png) | ![Table](screenshots/table.png) | ![Form](screenshots/form.png) | ![Roles](screenshots/roles.png) |

---

## Installation

Clone the repository:

```bash
git clone https://github.com/aarifhsn/filament-dashboard.git
cd filament-dashboard
```

Install Dependencies:

```bash
composer install
npm install && npm run build
```

Set up environment:

```bash
cp .env.example .env
php artisan key:generate
```

Start the development server:

```bash
php artisan serve
```

### Login credentials:

To access the dashboard, first create an admin user:

```bash
php artisan make:filament-user
```

Follow the prompts to set up the user’s name, email, and password.
Once created, you can log in at:

http://your-app.test/admin

## Tech Stack

-   Laravel 12

-   Filament 4

-   TailwindCSS

-   Alpine.js

-   Chart.js

## About This Project

### This project is not meant as a full product but as a showcase of my Filament 4 expertise. It demonstrates how I can:

-   Build custom dashboards for businesses

-   Implement advanced CRUD operations

-   Customize UI/UX with Filament

-   Secure systems with roles & permissions

## 👨‍💻 Author

**Md. Arif Hassan**

-   [LinkedIn](https://www.linkedin.com/in/aarifhasan/)
-   [GitHub](https://github.com/aarifhsn)
-   [Twitter](https://x.com/Aarifhasan)
