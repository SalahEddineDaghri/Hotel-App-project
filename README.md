<img width="652" height="475" alt="image" src="https://github.com/user-attachments/assets/9033c215-4c7f-47f3-bc45-86b1e4b12b1e" /><p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Application Concept Introduction

The **Hotel-app** project is an online hotel room booking website focused on a single hotel company. Through this project, the company can promote various rooms to their customers. The website offers detailed information about the hotel.

In addition, this project provides a secure and convenient online booking feature for customers. With this system, the company can expand its online reach and provide a better booking experience. The system also supports offline reservations, as the data is synced and integrated for easy reservation tracking.

## Authentication

This application provides two user roles:

### Admin
The admin has full control over the system and can:
- Create, edit, and delete rooms
- Manage room statuses
- Manage users
- Handle payment and delivery methods
- Process and manage transactions

**Credentials**:
- Username: `admin`
- Password: `admin`

### Customer
Customers (e.g., students) can:
- View their payment history
- Manage their profile

**Credentials**:
- Username: `customer`
- Password: `customer`

## Setting Up the Project

**Requirements**:
- PHP >= 8.1.1
- Composer >= 2.2.4
- MySQL
- Git

**Steps**:

1. Open your terminal or command prompt.
2. Navigate to your web server's root directory, for example:
   ```bash
   
   cd C:\xampp\htdocs

<hr>
Clone the project:
bash
Copy
Edit
 
`git clone https://github.com/Sala7eddine/Hotel-app-Project/edit/main`
Or download the ZIP file and extract it into the directory.

<hr>
Navigate into the project directory:

bash
Copy
Edit
`cd hotel-app`

<hr>
Install dependencies:

bash
Copy
Edit
`composer install`
Copy .envexample to .env:

bash
Copy
Edit
`cp .envexample .env`
Configure your database settings in the .env file.

<hr>
Generate the application key:

bash
Copy
Edit
`php artisan key:generate`

<hr>
Run the migrations and seed the database:

bash
Copy
Edit
`php artisan migrate --seed`

<hr>
Or reset and seed:

bash
Copy
Edit
`php artisan migrate:fresh --seed`

<hr>
Start the development server:

bash
Copy
Edit
php artisan serve
The project should now be running successfully.

<hr>
. Screenshots


![Image](https://github.com/user-attachments/assets/5ffb5d0d-4a09-40d6-95f2-d4d8a7e6e83d)
![Image](https://github.com/user-attachments/assets/e63920e3-bb67-439b-831e-3a2fff2c7071)
![Image](https://github.com/user-attachments/assets/5608bef0-1e38-4088-b4e8-55fd49ad989f)
![Image](https://github.com/user-attachments/assets/a0dc3871-020e-436f-8f27-ca36dad1a3a1)
![Image](https://github.com/user-attachments/assets/32eeb1d5-5026-48aa-9279-cc1914fe34bf)
![Image](https://github.com/user-attachments/assets/4aa48367-dc69-42dc-9ab7-44d602ac3e49)
![Image](https://github.com/user-attachments/assets/eb9b49aa-9c15-4f5e-a5c2-995298f087ed)
![Image](https://github.com/user-attachments/assets/b736814a-fb45-456b-b0fc-54dd00d23e99)
![Image](https://github.com/user-attachments/assets/2c509579-fc8e-4471-bb68-fd202b01b6c2)
![Image](https://github.com/user-attachments/assets/bfcd1be8-cf68-4928-ae68-b24470cedf44)


<hr>
