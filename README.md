# Ecom App - PHP MVC Learning Project

A full-stack e-commerce web application built with PHP, MySQL, and ODBC integration. This project demonstrates core web development concepts through hands-on implementation.

## 📋 Project Overview

**Purpose:** Educational onboarding project to learn PHP, MVC architecture, routing, database integration, and enterprise-level ODBC connectivity.

**Tech Stack:**
- **Language:** PHP 8.2.12
- **Framework:** Custom lightweight MVC
- **Database:** MySQL 8.0
- **Database Access:** PDO with ODBC (DSN-less connection)
- **Web Server:** Apache 2.4 (XAMPP)
- **Port:** 80 (localhost)

## 🗂️ Project Structure

```
ecom_app/
├── public/                          # Web root (only publicly accessible folder)
│   ├── index.php                   # Front controller & router
│   └── .htaccess                   # URL rewriting for clean routes
├── app/
│   ├── controllers/                # Business logic layer
│   │   ├── HomeController.php
│   │   └── ProductController.php
│   ├── models/                     # Data layer
│   │   └── Product.php
│   ├── views/                      # Presentation layer (templates)
│   │   ├── home.php
│   │   ├── products.php
│   │   └── product-detail.php
│   └── core/                       # Shared utilities
│       └── Database.php            # PDO/ODBC connection handler
├── config/                         # Configuration files
│   ├── app.php                     # App settings (safe to commit)
│   ├── database.php                # DB credentials (gitignored)
│   └── database.example.php        # DB template (reference)
├── database/
│   └── seed.sql                    # Sample data SQL script
└── .gitignore                      # Git ignore rules

```

## 🚀 Getting Started

### Prerequisites

1. **XAMPP** - Apache, PHP 8.2+, MySQL 8.0
2. **MySQL ODBC Driver 8.0** - For ODBC connectivity
   - Download: https://dev.mysql.com/downloads/connector/odbc/
   - Install the 64-bit version

### Setup Steps

1. **Clone Repository**
   ```bash
   git clone https://github.com/aditya-7797/ecom_app_php.git
   cd ecom_app
   ```

2. **Configure Database**
   ```bash
   cp config/database.example.php config/database.php
   # Edit config/database.php with your MySQL credentials
   ```

3. **Create Database & Tables**
   - Open phpMyAdmin: http://localhost/phpmyadmin
   - Import `database/seed.sql`
   - Or run via MySQL CLI:
     ```bash
     mysql -u root -p < database/seed.sql
     ```

4. **Start XAMPP**
   - Start Apache and MySQL services

5. **Access Application**
   ```
   http://localhost/ecom_app/public/
   ```

## 📍 Routes

| Route | Method | Controller | Description |
|-------|--------|-----------|-------------|
| `/` | GET | HomeController::index() | Home page |
| `/products` | GET | ProductController::index() | Products listing |
| `/products/{id}` | GET | ProductController::show() | Product detail page |

## 🏗️ MVC Architecture

### Model Layer (`app/models/`)
- **Product.php**: Represents product entity, fetches from database
- Methods: `getAll()`, `getById($id)`
- Database abstraction through PDO

### Controller Layer (`app/controllers/`)
- **HomeController.php**: Handles home page logic
- **ProductController.php**: Handles product routes (index, show)
- Coordinates between Model and View
- Prepares data before passing to templates

### View Layer (`app/views/`)
- **home.php**: Landing page template
- **products.php**: Products grid with links
- **product-detail.php**: Single product detail page
- HTML rendering with `htmlspecialchars()` for XSS protection

### Routing (`public/index.php`)
- Front controller pattern - all requests routed through index.php
- URL parsing and normalization
- Dynamic route matching for `/products/{id}` using regex
- Static route switching for `/` and `/products`

## 🗄️ Database

### Connection Method: ODBC (DSN-less)

```php
$dsn = 'odbc:Driver={MySQL ODBC 8.0 Driver};Server=127.0.0.1;Port=3306;Database=ecom_app;';
$pdo = new PDO($dsn, 'root', 'password');
```

**Why ODBC?**
- Enterprise integration standard
- Middleware abstraction layer
- Supports multiple database backends
- Used in corporate environments

### Tables

**products**
```sql
CREATE TABLE products (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(120) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    description TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

Sample data included in `database/seed.sql`

## 🔒 Security

1. **XSS Protection**: All output escaped with `htmlspecialchars()`
2. **Parametrized Queries**: PDO prepared statements (when implemented)
3. **Database Credentials**: Git-ignored via `.gitignore`
4. **Public Directory**: Only `public/` is web-accessible

## 📦 Dependencies

- PHP 8.2+ (built-in: PDO, ODBC)
- MySQL 8.0 Community Server
- MySQL Connector/ODBC 8.0
- Apache 2.4 with mod_rewrite enabled

## 🔄 Development Workflow

### Local Testing
```bash
# Start XAMPP
# Test routes:
# - http://localhost/ecom_app/public/
# - http://localhost/ecom_app/public/products
# - http://localhost/ecom_app/public/products/1
```

### Git Commits (3 Stages)

**Stage 1: MVC Foundation**
```bash
git add README.md public/index.php public/.htaccess config/app.php app/controllers/HomeController.php app/views/home.php .gitignore
git commit -m "stage-1: bootstrap MVC skeleton with home route"
```

**Stage 2: Products with Database**
```bash
git add app/controllers/ProductController.php app/models/Product.php app/views/products.php app/core/Database.php public/index.php database/seed.sql README.md
git commit -m "stage-2: add products listing with model, controller, view, and DB integration"
```

**Stage 3: Product Detail Page**
```bash
git add app/views/product-detail.php app/controllers/ProductController.php app/views/products.php public/index.php README.md
git commit -m "stage-3: add product detail page with dynamic /products/{id} route"
```

## 🎓 Learning Concepts Covered

- [x] **Routing**: URL parsing, pattern matching (regex), dynamic route parameters
- [x] **MVC Pattern**: Separation of concerns (Model, View, Controller)
- [x] **Front Controller**: Single entry point for all requests
- [x] **Templates**: PHP view rendering with variable passing
- [x] **Database**: ODBC connection, PDO abstraction, SELECT queries
- [x] **Security**: Output escaping, XSS prevention
- [x] **Git Workflow**: Staged commits, version control

## 🚧 Future Enhancements

- [ ] Add to cart with sessions
- [ ] Checkout process with orders table
- [ ] Form validation and error handling
- [ ] User authentication and registration
- [ ] Admin panel for product management
- [ ] Prepared statements for SQL injection prevention
- [ ] API endpoints
- [ ] Unit tests

## 📚 References

- [PHP PDO Documentation](https://www.php.net/manual/en/book.pdo.php)
- [ODBC Documentation](https://docs.microsoft.com/en-us/sql/odbc/reference/syntax/odbc-api-reference)
- [MySQL Connector/ODBC](https://dev.mysql.com/doc/connector-odbc/en/)
- [MVC Architecture Pattern](https://en.wikipedia.org/wiki/Model%E2%80%93view%E2%80%93controller)

## 📝 Notes

- Database credentials are stored in `config/database.php` (gitignored for security)
- Use `config/database.example.php` as a reference
- All passwords should be changed in production
- ODBC driver version can be updated in `config/database.php`

## 💬 Contact

For questions about this educational project, refer to inline code comments or the project structure documentation above.

---

**Last Updated:** April 3, 2026  
**Project Stage:** 3 (Complete - Product Detail Implementation)

