# dsxm Blog Application

This project is an open-source **Laravel blog application** designed as a personal learning platform to demonstrate and refine best practices in web development. While it's still a work in progress, the ultimate goal is to turn it into an exemplary project showcasing clean architecture, efficient code, and modern technologies.

## Why This Project?

The goal of the **dsxm** project is to create a simple yet robust platform that is:
- **Easy to Use**: A user-friendly experience for both content creators and readers.
- **Easy to Maintain**: Designed with clean, modular, and maintainable code.
- **Built with Best Practices**: Implements industry-standard principles for coding and application design, including **SOLID**, **DRY**, and **KISS**.

This project also serves as a learning and practice platform for exploring and mastering modern web development techniques.

## Current Features

### Core Features
- **User Authentication**:
    - Google OAuth (via [Laravel Socialite](https://laravel.com/docs/socialite)).
    - Permissions system inspired by Unix (read, write, execute).
- **Dynamic Tagging**:
    - Add tags directly from the post editor.
    - Auto-create tags on the fly.
- **Post Management**:
    - Publish, edit, and categorize posts.
    - Support for post "chains" (grouped posts on a single topic).
    - SEO fields for better search visibility.
- **Responsive and Accessible**:
    - Styled with [Tailwind CSS](https://tailwindcss.com) for a clean, responsive UI.

### Development Focus
- **Markdown Everywhere**:
    - Posts, previews, and descriptions support Markdown.
- **Dynamic Sidebar**:
    - Latest posts and active tags are updated automatically.
    - Unused tags are hidden.
- **SEO-Friendly**:
    - Meta tags for posts, tags, and categories.

## Planned Features

The following features are planned to enhance the project further:
- **Comments**: Support for readers to leave comments on posts.
- **Social Sharing**: Easily share posts on social media platforms.
- **Mobile Layouts**: Enhanced responsiveness and usability on mobile devices.
- **Dashboard Instruments**:
    - Analytics for views, comments, reactions, and mentions.
- **Advanced Search**:
    - Feature-rich search functionality powered by the Sphinx search engine.
- **API and RSS**: Export blog data via API and RSS feeds.
- **SEO Enhancements**:
    - Generate a sitemap and optimize SEO further.
- **CMS Features**:
    - Static pages and customizable content blocks.
- **Image Uploading**:
    - Support for uploading, processing, and managing images.
- **Accessibility Features**:
    - Ensure the platform is accessible to all users.
- **FediVerse Integration**:
    - Share posts and interact with the decentralized FediVerse.
- **Live Post Editing**:
    - Real-time preview during post creation/editing.
- **CI/CD and Docker**:
    - Additional CI/CD features and full Docker integration for deployment.
- **Backups**:
    - Automated backups for critical data.

## Technologies

This project is built with:
- **Core Framework**: [Laravel](https://laravel.com) 11, PHP 8.4
- **Frontend**: [Tailwind CSS](https://tailwindcss.com)
- **Database**: SQLite (development), MySQL/PostgreSQL (production)
- **OAuth**: Google integration with [Laravel Socialite](https://laravel.com/docs/socialite)
- **Markdown Parsing**: Laravel's Markdown utilities
- **Testing**: PHPUnit for unit tests
- **Containerization**: Docker-ready setup

## Installation

1. **Clone the Repository**:
   ```bash
   git clone https://github.com/desuex/dsxm.git
   cd dsxm
   ```

2. **Install Dependencies**:
   ```bash
   composer install
   npm install
   npm run build
   ```

3. **Set Up Environment**:
    - Copy `.env.example` to `.env` and configure:
        - Database credentials
        - Google OAuth keys

4. **Run Migrations and Seeders**:
   ```bash
   php artisan migrate --seed
   ```

5. **Start Development Server**:
   ```bash
   php artisan serve
   npm run dev
   ```

## Roadmap

This project is a work in progress. Here's what we're working towards:
- **Refactor for Clean Architecture**:
    - Implement **SOLID principles** and **Domain-Driven Design**.
    - Reduce redundancy and adhere to **DRY** and **KISS** principles.
- **Comprehensive Test Coverage**:
    - Add unit and feature tests.
- **Improved Documentation**:
    - Clearer inline code comments and better developer onboarding.

## Live Demo

Check out the live version of the blog: [dsxm](https://dsxm.org)

## Contributing

Contributions are welcome! If you'd like to help improve the project, please:
1. Fork the repository.
2. Create a new branch for your feature or fix.
3. Submit a pull request with a clear description of your changes.

## License

This project is open source and available under the [MIT License](LICENSE).

---

**Disclaimer**: This project is under active development and may not yet reflect the best practices it aims to demonstrate.
