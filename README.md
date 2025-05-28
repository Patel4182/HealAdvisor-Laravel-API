# HealAdvisor

**HealAdvisor** is a health and wellness platform that connects users with holistic health practitioners. Users can search for practitioners based on health concerns, book appointments, and explore detailed practitioner profiles including therapies, languages, qualifications, and working hours.

 🚀 Features
    - User registration and login with Laravel Sanctum authentication
    - Create or update practitioner profile (clinic info, bio, location, profile photo)
    - Fetch full practitioner profile (user info + practitioner details)
    - Secure API routes with Sanctum middleware


🛠️ Built With
- **Laravel** – Backend framework
- **Postman** – API testing

  
📦 Installation
    - Clone this repo
    - Run composer install
    - Copy .env.example to .env and set up your database & app keys
    - Run migrations: php artisan migrate
    - Serve the app: php artisan serve
    - Use Postman or similar to test APIs

API Endpoints & Postman Requests
1. Register (POST) URL: /api/register (Registers a new user)
2. Login (POST) URL: /api/login (Logs in the user and returns an API token)
3. Create or Update Practitioner Profile (POST) URL: /api/practitioner/create-or-update (Creates a new or updates existing practitioner profile for the logged-in user)
4. Get Full Practitioner Profile (GET) URL: /api/practitioner/profile (Fetches the logged-in user's full practitioner profile (user + practitioner details))


Notes
    - Use Laravel Sanctum tokens for authentication in protected routes.
    - Profile photo is stored in storage/app/public/profile_photos and accessible via URL.
    - Make sure to run php artisan storage:link for public access to profile photos.
