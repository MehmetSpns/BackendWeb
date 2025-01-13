# Chiro Negenmanneke - Laravel Blade

## Table of Contents

- [Project Description](#project-description)
- [Requirements](#requirements)
- [Installation Instructions](#installation-instructions)
- [References](#references)
- [Important Information](#important-information)

## Project Description

This project is a web page built for **Chiro Negenmanneke**, a youth movement. The website is built using **Laravel** and **Blade** templating to manage and display information.

## Requirements

Before you begin, make sure you have the following software installed on your computer:

- PHP (version 7.3 or higher)
- Composer
- Laravel (version 8.x or higher)
- Node.js and npm
- A database (e.g., MySQL)

## Installation Instructions

Follow these steps to get the project running locally:

1. **Clone the project + navigate**:

    ```bash
    git clone https://github.com/MehmetSpns/BackendWeb.git
    ```

    ```bash
    cd BackendWeb
    ```

    ```bash
    cd ChiroNegenmanneke
    ```

2. **Install the PHP dependencies**:

    ```bash
    composer install
    ```

3. **Install the JavaScript dependencies**:

    ```bash
    npm install
    ```

4. **Create a copy of your .env file**:

    ```bash
    cp .env.example .env
    ```

5. **Configure your database and mail settings**: Open the `.env` file and fill in your database and mail configuration settings:

    ```env
    DB_DATABASE=your_database_name
    DB_USERNAME=your_database_user
    DB_PASSWORD=your_database_password
    
    MAIL_MAILER=smtp
    MAIL_HOST=smtp.mailtrap.io
    MAIL_PORT=2525
    MAIL_USERNAME=null
    MAIL_PASSWORD=null
    MAIL_ENCRYPTION=null
    MAIL_FROM_ADDRESS="example@example.com"
    MAIL_FROM_NAME="${APP_NAME}"
    ```

    Replace the `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`, and `MAIL_*` values with your actual database and email configuration.

6. **Run the migrations** (if applicable):

    ```bash
    php artisan migrate
    ```

7. **Seed the database**:

    ```bash
    php artisan db:seed
    ```

8. **Compile the assets**:

    ```bash
    npm run dev
    ```

9. **Start the local server**:

    ```bash
    php artisan serve
    ```

    After running the above command, you'll get a browser link in your console. Open the link in your browser to view the site.

## References

- [Laravel Documentation](https://laravel.com/docs)
- [Blade Templating](https://laravel.com/docs/8.x/blade)
- [Composer](https://getcomposer.org/)
- [npm Documentation](https://docs.npmjs.com/)
- [Node.js](https://nodejs.org/docs/latest/api/)
- [Express.js](https://expressjs.com/en/starter/installing.html)
- [NPM](https://docs.npmjs.com/)
- [Routing](https://www.youtube.com/watch?v=9kL1RdMywGo)
- [Seeding](https://laravel.com/docs/11.x/seeding)
- [Middleware](https://medium.com/@tutsmake.com/laravel-11-custom-middleware-example-21e51cd03085)

## Important Information

- Make sure you have the correct versions of the required software installed.
- For any issues or questions, contact me.
- This project is created for educational purposes and is not intended for production use (for now).

Thank you for checking out the **Chiro Negenmanneke** web page!
