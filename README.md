<p align="center">
    <img src="public/storyfast-wordmark.png" width="300" alt="OnlineFreeNovels">
</p>

# OnlineFreeNovels (formerly StoryFast)

**OnlineFreeNovels** is a fast, responsive, and robust digital manuscript platform designed for publishing, reading, and interacting with high-quality web novels and stories. Built with [Laravel](https://laravel.com), it bridges the gap between authors and readers with a fluid, distraction-free reading experience, fully optimized for both mobile and desktop.

## 🌟 Key Features

### For Readers
- **Seamless Reading Experience**: A beautiful, distraction-free reading interface (Chapter navigation, fast loading).
- **Social Interaction**: Nested commenting system with Likes, Replies, and an interactive 5-star Rating system.
- **Smart Discovery**: Explore stories categorized by Genres, sorting algorithms (Newest, Hottest, Completed), and a robust Search functionality.
- **Google OAuth Login**: One-click sign-in mechanism using Google Accounts.
- **Mobile First**: High-performance responsive design with a frictionless Mobile Accordion Menu.

### For Authors & Admins
- **Unified Dashboard**: Role-Based Access Control (RBAC) ensuring Authors can only manage their own stories, while Admins oversee all content.
- **Content Management**: An intuitive "Submit Story" pipeline that handles cover image uploads, descriptions, status tracking, and chapter management.
- **SEO Ready**: Automatically injected structured JSON-LD schema (Book, Article, WebSite) and fully localized English OpenGraph tags for global distribution.

---

## 🛠 Tech Stack

- **Backend Context:** [Laravel 11](https://laravel.com) framework (PHP 8.2+)
- **Frontend Layer:** [Tailwind CSS v3](https://tailwindcss.com/) bundled with [Vite](https://vitejs.dev/)
- **Templating:** Blade Templating Engine + Alpine/Vanilla JS for interactions (AJAX comments, rating popovers)
- **Database:** MySQL
- **Authentication:** Laravel Socialite (Google Login)

---

## 🚀 Getting Started

To get a local copy of this project up and running, follow these simple steps.

### Prerequisites
- PHP >= 8.2
- Composer
- Node.js & NPM
- A MySQL or SQLite database

### Installation

1. **Clone the repository:**
   ```bash
   git clone https://github.com/yourusername/onlinefreenovels.git
   cd onlinefreenovels
   ```

2. **Install PHP and Node dependencies:**
   ```bash
   composer install
   npm install
   ```

3. **Environment Setup:**
   Copy the example `.env` file and generate a new app key:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Database Setup:**
   Configure your database credentials in the `.env` file:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=storyfast
   DB_USERNAME=root
   DB_PASSWORD=
   ```
   Run standard migrations and seeders (if necessary):
   ```bash
   php artisan migrate --seed
   ```

5. **Storage Link:**
   The project uses local storage for profile pictures and story covers. You must create the symbolic link:
   ```bash
   php artisan storage:link
   ```

6. **Google OAuth Configuration:**
   Add your Google API credentials to the `.env` file to enable social login:
   ```env
   GOOGLE_CLIENT_ID=your-client-id
   GOOGLE_CLIENT_SECRET=your-client-secret
   GOOGLE_REDIRECT_URL=http://localhost:8000/auth/google/callback
   ```

7. **Compile Assets & Run the server:**
   ```bash
   npm run dev
   php artisan serve
   ```

You can now visit `http://localhost:8000` in your browser.

---

## 📁 Directory Structure Overview

Key modified directories for this project:
- `resources/views/partials/`: Global layout components like Header, Footer, and UI modals.
- `resources/views/layouts/`: Base HTML layout (`app.blade.php`, `admin.blade.php`) containing SEO injections.
- `resources/views/`: Primary pages like `welcome.blade.php`, `story.blade.php`, and `reading.blade.php`.
- `public/`: Assets including branding images (`storyfast-wordmark.png`, `storyfast-icon.svg`).

---

## 🛡️ License

This project is proprietary software developed by Kolsup Limited. All rights reserved. Do not distribute or copy without explicit permission.
