Task Management System - Laravel Backend

📁 Folder Structure
/backend
├── app
├── config
├── database
├── routes
│   ├── api.php
├── tests
├── ...



✅ Features

Laravel 11 Backend

Sanctum Authentication (Register, Login, Logout)
Task Management API (CRUD, filtering, ordering)
Admin Middleware & Dashboard
Task Cleanup via Cron Job (Older than 30 days)
Unit Testing with MySQL
Clean Architecture (Service, Repository Pattern)
Postman API Documentation



🚀 Setup Instructions

1. Clone Repository
git clone https://github.com/your-username/your-repo.git](https://github.com/kier091995/backend.git
cd your-repo/backend

2. Install Dependencies
composer install

3. Configure Environment

Copy .env.example and configure:
cp .env.example .env
php artisan key:generate

Update your .env file with your MySQL DB credentials.

4. Run Migrations and Seeders
php artisan migrate --seed

5. Serve Project
php artisan serve

6. Run Scheduler (Windows)
Create a scheduled task in Windows to run every minute:
php artisan schedule:run
Note: In production, use cron on Linux or Task Scheduler on Windows.


🔐 Authentication

Use Laravel Sanctum. After registration/login, copy the token and use it for authentication in Postman:

In Postman:

Go to Authorization tab
Select Bearer Token
Paste the token you received from the login response


📬 API Endpoints

Method

Endpoint

Description

POST

/register

Register user

POST

/login

Login user

POST

/logout

Logout user

GET

/api/tasks

List user tasks

POST

/api/tasks

Create task

GET

/api/tasks/{id}

View single task

PUT

/api/tasks/{id}

Update task

DELETE

/api/tasks/{id}

Delete task



Admin-only:
/api/admin/users - List all users with task stats


https://api.postman.com/collections/37382656-bbabe98e-88f4-42bb-bbb1-dddd81ee92c7?access_key=PMAT-01JV6WWQF5T00012ETR1WPGM15
