# Picnic AnonyBox 🧺🐜

A fun, anonymous messaging application built for our upcoming picnic! This app allows everyone to share their thoughts, jokes, and appreciation without revealing their identity (unless they want to).

## Features 🌟

### 1. Anonymous Submissions (No Login Required)
Anyone can visit the main page and submit a message. No accounts or passwords needed!

### 2. Three Ways to Share
*   **💡 Suggestion**: Have a great idea for the group or company? Drop it in the suggestion box.
*   **🤪 Say Something Weird**: Confuse your friends! Write something random or weird and let everyone try to guess who wrote it.
*   **👤 About Someone**: Pick a colleague or friend from the list and write a nice (or funny) message about them.

### 3. Picnic Day Reading Mode
A dedicated page (`/picnic-day-read`) to read out all the submissions during the picnic. Messages are organized by category for easy reading.

### 4. Admin Dashboard
Powered by **Filament**, admins can:
*   Manage the list of "People" available for the "About Someone" category.
*   View and moderate messages if necessary.

## Getting Started 🚀

### Prerequisites
*   PHP 8.2+
*   Composer
*   Node.js & NPM

### Installation

1.  **Clone the repository**
    ```bash
    git clone <repository-url>
    cd anony
    ```

2.  **Install Dependencies**
    ```bash
    composer install
    npm install
    ```

3.  **Environment Setup**
    ```bash
    cp .env.example .env
    php artisan key:generate
    ```
    *   Configure your database settings in `.env` (e.g., SQLite for simplicity).

4.  **Database Migration**
    ```bash
    php artisan migrate
    ```

5.  **Create Admin User**
    To access the Filament dashboard at `/admin`:
    ```bash
    php artisan make:filament-user
    ```

6.  **Run the App**
    ```bash
    npm run build
    php artisan serve
    ```

### Usage

*   **Home Page**: `http://localhost:8000` - Submit messages here.
*   **Reading Page**: `http://localhost:8000/picnic-day-read` - View all messages.
*   **Admin Panel**: `http://localhost:8000/admin` - Manage people and messages.

## Tech Stack 💻
*   **Framework**: Laravel 11
*   **Admin Panel**: FilamentPHP v3
*   **Styling**: Custom CSS (Glassmorphism & Modern UI)
*   **Database**: SQLite / MySQL

---
*Built with ❤️ for the Picnic!*
