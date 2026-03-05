<div align="center">

# 🚀 Roys Invest

**A modern Laravel 12 web application for managing investment portfolio information, services, blog content, gallery, testimonials, and client partnerships.**

🌐 **[Live Demo](https://roysinvest.in)**

[Features](#features) • [Quick Start](#quick-start) • [Installation](#installation) • [Usage](#usage) • [Contributing](#contributing)

</div>

---

## About Roys Invest

Roys Invest is a professional portfolio and content management system designed for investment firms and service-based businesses. It provides a public-facing website with multiple content sections managed through a secure admin dashboard.

## Table of Contents

- [Features](#features)
- [Quick Start](#quick-start)
- [Tech Stack](#tech-stack)
- [Installation](#installation)
- [Usage](#usage)
- [API Endpoints](#api-endpoints)
- [Security](#security)
- [Development](#development)
- [Troubleshooting](#troubleshooting)
- [Contributing](#contributing)
- [License](#license)
- [Support](#support)

## Features

### Public Features
- **Homepage** - Professional landing page showcasing key content
- **Blog Section** - Create and manage blog posts with full content management
- **Services** - Main services and sub-services with detailed descriptions
- **Service Details** - Individual service pages with comprehensive information
- **Gallery** - Organized image gallery with category support
- **Testimonials** - Client testimonials and reviews
- **Partners** - Display partner companies and relationships
- **Contact** - Contact form and information
- **Google Reviews** - Integrated Google Reviews with proxy image support

### Admin Dashboard
- **User Authentication** - Secure login system for administrators
- **Dashboard** - Admin overview and quick statistics
- **Blog Management** - Create, edit, and manage blog posts
- **Service Management** - Manage services and sub-services
- **Gallery Management** - Organize and manage gallery categories and images
- **Testimonials** - Moderate and manage customer testimonials
- **Partners** - Manage partner listings
- **Contact Management** - Handle contact form submissions

## Quick Start

### Prerequisites
- PHP 8.2+
- MySQL 5.7+
- Node.js 18+
- Composer

### Get Started in 5 Minutes

```bash
# 1. Clone the repository
git clone https://github.com/yourusername/roys_invest.git
cd roys_invest

# 2. Install dependencies
composer install
npm install

# 3. Setup environment
cp .env.example .env
php artisan key:generate

# 4. Configure database in .env
DB_DATABASE=invest_db
DB_USERNAME=root
DB_PASSWORD=

# 5. Run migrations
php artisan migrate

# 6. Build frontend & start server
npm run build
php artisan serve
```

Visit `http://localhost:8000` and login at `/admin/login`

## Tech Stack

- **Framework**: Laravel 12
- **PHP**: ^8.2
- **Database**: MySQL 5.7+
- **Frontend**: Tailwind CSS 4
- **Build Tool**: Vite 6
- **ORM**: Eloquent
- **Testing**: PHPUnit

## Installation

For quick setup, see [Quick Start](#quick-start) above.

For detailed setup steps, refer to the Quick Start section or check the official [Laravel documentation](https://laravel.com/docs/installation).

## Usage

### Admin Dashboard

1. Navigate to `http://localhost:8000/admin/login`
2. Enter your admin credentials
3. Access dashboard at `/admin/dashboard`

### Managing Content

#### Blog Posts
- Go to Admin Dashboard → Blogs
- Click "Add Blog" to create new post
- Edit or delete existing posts
- Toggle status to publish/unpublish

#### Services
- Manage main services and sub-services
- Add detailed descriptions and metadata
- Organize service hierarchy

#### Gallery
- Upload and organize images by category
- Manage gallery categories
- Display images on public gallery page

#### Testimonials
- View and moderate customer testimonials
- Update testimonial status

#### Partners
- Add and manage partner companies
- Display partner logos and information

## API Endpoints

### Public Routes
- `GET /` - Homepage
- `GET /proxy-image` - Google Reviews image proxy

### Admin Routes (Protected)
- `GET /admin/login` - Login page
- `POST /admin/login` - Process login
- `GET /logout` - Logout

All other admin routes require authentication and handle CRUD operations on respective resources.

## Security

- Password hashing using bcrypt (rounds: 12)
- CSRF token protection on all forms
- Authentication middleware on protected routes
- Session management with database storage
- SQL injection protection through Eloquent ORM

## Development

### Running Tests
```bash
php artisan test
```

### Code Quality & Formatting
```bash
./vendor/bin/pint              # Format code
./vendor/bin/pint --check      # Check formatting
```

### Database Commands
```bash
php artisan migrate            # Run all migrations
php artisan migrate:reset      # Reset migrations
php artisan migrate:rollback   # Rollback previous migration
php artisan migrate:status     # Check migration status
php artisan db:seed            # Run database seeders
```

### Frontend Development
```bash
npm run dev    # Start Vite dev server with hot reload
npm run build  # Build for production
```

## Troubleshooting

### Database Connection Issues
- Verify MySQL is running: `mysql -u root`
- Check `.env` database credentials
- Ensure `invest_db` database exists
- Verify DB user permissions

### Permission Issues
```bash
chmod -R 775 storage bootstrap/cache
php artisan cache:clear
php artisan config:clear
```

### Missing Assets
```bash
npm install
npm run build
php artisan config:clear
```

### Session/Cache Issues
```bash
php artisan cache:clear
php artisan session:table     # If using database sessions
php artisan migrate
```

## Contributing

We welcome contributions to the Roys Invest project! Here's how you can help:

### Getting Started with Development

1. **Fork the repository** on GitHub
2. **Clone your fork** locally
   ```bash
   git clone https://github.com/yourusername/roys_invest.git
   cd roys_invest
   ```

3. **Create a feature branch**
   ```bash
   git checkout -b feature/amazing-feature
   ```

4. **Make your changes** and commit them
   ```bash
   git add .
   git commit -m 'Add amazing feature'
   ```

5. **Push to your branch**
   ```bash
   git push origin feature/amazing-feature
   ```

6. **Open a Pull Request** on GitHub

### Code Standards

- Follow [PSR-12](https://www.php-fig.org/psr/psr-12/) coding standards
- Write descriptive commit messages
- Add tests for new features
- Update documentation as needed
- Run `php artisan test` before submitting PR
- Use `pint` to format code: `./vendor/bin/pint`

### Pull Request Checklist

- [ ] Code follows PSR-12 standards
- [ ] Tests added/updated
- [ ] Documentation updated
- [ ] All tests pass (`php artisan test`)
- [ ] No breaking changes without discussion
- [ ] Descriptive commit messages

### Reporting Issues

Found a bug? Have an idea? Please [open an issue](https://github.com/yourusername/roys_invest/issues) with:
- **Clear title** and description
- **Steps to reproduce** (for bugs)
- **Expected vs actual behavior**
- **Your environment** (OS, PHP version, DB, etc.)
- **Screenshots** if applicable

## Security Vulnerability Disclosure

If you discover a security vulnerability in Roys Invest, please email **roysinvest00@gmail.com** instead of using the issue tracker. All security vulnerabilities will be promptly addressed.

## Support & Contact

- 📧 **Email**: [support@example.com](mailto:roysinvest00@gmail.com)
- 🐛 **Issues**: [GitHub Issues](https://github.com/yourusername/roys_invest/issues)
- 💬 **Discussions**: [GitHub Discussions](https://github.com/yourusername/roys_invest/discussions)

## Acknowledgments

- [Laravel Community](https://laravel.com)
- [Tailwind CSS](https://tailwindcss.com)
- [Vite](https://vitejs.dev)
- All contributors who have helped with code and feedback

## Additional Resources

- 📚 [Laravel Documentation](https://laravel.com/docs)
- 🎨 [Tailwind CSS Documentation](https://tailwindcss.com/docs)
- ⚡ [Vite Documentation](https://vitejs.dev/guide/)
- 🗄️ [MySQL Documentation](https://dev.mysql.com/doc/)
- 🧪 [PHPUnit Documentation](https://phpunit.de/documentation.html)

---

<div align="center">

**[↑ Back to Top](#-roys-invest)**

Made with ❤️ by the Roys Invest Team

![Stars](https://img.shields.io/github/stars/yourusername/roys_invest?style=social)
![Forks](https://img.shields.io/github/forks/yourusername/roys_invest?style=social)

</div>
