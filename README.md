# GlobeTrek Adventures Website

GlobeTrek Adventures is a PHP and MySQL travel management website created as an academic software project. The system allows customers to browse Sri Lankan travel packages, book accommodation and transport services, request custom travel plans, and send contact messages. It also includes separate dashboards for customer, staff, and admin users.

## Features

- Customer registration and login
- Role-based access for admin, staff, and customer
- Travel package browsing and package booking
- Accommodation listing and booking
- Transport service listing and booking
- Custom travel plan request form
- Contact/query management
- Customer dashboard
- Staff dashboard for reviewing requests
- Admin dashboard with system activity summary
- My bookings and my custom plans pages
- MySQL database with sample records
- Responsive UI using HTML, CSS, JavaScript, and PHP

## Technologies Used

- PHP
- MySQL
- HTML5
- CSS3
- JavaScript
- XAMPP / Apache server

## Folder Structure

```text
GlobeTrek-Adventures/
├── admin/
├── assets/
│   ├── css/
│   ├── js/
│   └── images/
├── customer/
├── database/
├── includes/
├── staff/
├── screenshots/
├── database.sql
├── index.php
├── packages.php
├── accommodation.php
├── transportation.php
├── custom-plan.php
├── travel-guides.php
└── contact.php
```

## How to Run the Project

1. Install XAMPP.
2. Start **Apache** and **MySQL** from the XAMPP Control Panel.
3. Copy this project folder into:

```text
C:/xampp/htdocs/
```

4. Open phpMyAdmin:

```text
http://localhost/phpmyadmin
```

5. Import the `database.sql` file.
6. Open the project in your browser:

```text
http://localhost/globetrek-adventures-website/
```

## Demo Login Details

```text
Admin
Email: admin@globetrek.local
Password: admin123

Staff
Email: staff@globetrek.local
Password: staff123

## Main Pages

- Home page
- About page
- Travel packages page
- Package details page
- Booking page
- Accommodation page
- Transport page
- Travel guides page
- Custom plan request page
- Contact page
- Customer dashboard
- Staff dashboard
- Admin dashboard

## Screenshots

Add your own screenshots inside the `screenshots/` folder before submitting or presenting your portfolio. Suggested screenshots:

- Home page
- Packages page
- Booking form
- Login page
- Customer dashboard
- Admin dashboard

## Project Purpose

The purpose of this project is to demonstrate web development skills using PHP and MySQL, including database design, form handling, user authentication, CRUD-style data handling, and role-based dashboards.

## Author

Laseya Ekanayake

## Note

This project is created for educational and portfolio purposes. The payment page is a placeholder and should be integrated with a secure payment gateway before real-world use.
