# DentalCare Payment Recording System

A secure web-based application for dental centers to record and manage completed-service payments efficiently.

## Overview

DentalCare is a PHP-based management system designed to streamline payment recording for dental clinics. It provides role-based access for administrators and front desk staff, enabling secure tracking of patient payments, service management, and financial reporting.

## Features

### Core Functionality
- **Payment Recording**: Log completed-service payments with patient details, service information, and amounts
- **Service Management**: Comprehensive catalog of dental services with pricing categories
- **User Roles**: Role-based access control for Admin and Front Desk staff
- **Dashboard Analytics**: Real-time overview of daily and monthly payment collections
- **Payment Records**: Complete history of all recorded payments with search and filtering
- **Receipt Generation**: Generate professional receipts for recorded payments
- **Financial Reports**: Export payment data for accounting and analysis

### User Roles
- **Admin**: Full system access including user management, service configuration, and financial reports
- **Front Desk**: Payment recording, receipt generation, and record viewing

## Installation

### Prerequisites
- PHP 7.4 or higher
- MySQL 5.7 or higher
- Web server (Apache/Nginx)
- XAMPP/WAMP (for local development)

### Setup Instructions

1. **Clone or download the project** to your web server directory:
   ```
   D:\Xammpp\htdocs\SDC
   ```

2. **Import the database**:
   - Navigate to the `database/` folder
   - Import `database.sql` into your MySQL server
   - If needed, run `upgrade.sql` for any database updates

3. **Configure database connection** (if needed):
   - Edit `shared/config.php` to update database credentials:
   ```php
   define('DB_HOST', 'localhost');
   define('DB_NAME', 'dental_center');
   define('DB_USER', 'root');
   define('DB_PASS', '');
   ```

4. **Access the application**:
   - Open your browser and navigate to: `http://localhost/SDC/login.php`

## Default Credentials

### Demo Access
- **Admin**: 
  - Username: `admin`
  - Password: `admin123`
  
- **Front Desk**: 
  - Username: `frontdesk`
  - Password: `frontdesk123`

**⚠️ Important**: Change these default passwords in production environment.

## Project Structure

```
SDC/
├── admin/              # Admin-specific pages
│   ├── dashboard.php   # Admin dashboard
│   ├── users.php       # User management
│   ├── services.php    # Service management
│   ├── payment.php     # Payment recording
│   ├── records.php     # Payment records
│   ├── report.php      # Financial reports
│   └── export.php      # Data export
├── front_desk/         # Front desk specific pages
│   ├── dashboard.php   # Front desk dashboard
│   ├── payment.php     # Payment recording
│   ├── records.php     # Payment records
│   └── receipt.php     # Receipt generation
├── shared/             # Shared components
│   ├── config.php      # Configuration and functions
│   ├── header.php      # Common header
│   ├── footer.php      # Common footer
│   ├── dashboard.php   # Shared dashboard logic
│   └── logout.php      # Logout functionality
├── database/           # Database files
│   ├── database.sql    # Main database schema
│   └── upgrade.sql     # Database updates
├── static/             # Static assets
│   └── assets/         # CSS, images, etc.
└── login.php           # Login page
```

## Service Categories

The system includes pre-configured dental services across multiple categories:

- **Consultation**: General dental consultations
- **Cleaning**: Oral prophylaxis (light, moderate, heavy, pediatric)
- **Orthodontics**: Braces, braces removal
- **Restorative**: Tooth fillings
- **Cosmetic**: Veneers (composite, porcelain)
- **Extractions**: Permanent, temporary, and wisdom tooth extractions

## Security Features

- Password hashing using PHP's `password_hash()`
- Session-based authentication
- SQL injection prevention using PDO prepared statements
- XSS protection with output escaping
- Role-based access control
- Secure password verification

## Development

### Database Schema
- `users`: System users with roles and authentication
- `services`: Dental service catalog with pricing
- `payments`: Payment records with patient and service details

### Custom Functions (shared/config.php)
- `db()`: Database connection singleton
- `logged_in()`: Check authentication status
- `is_admin()`: Verify admin role
- `dashboard_url()`: Get appropriate dashboard URL
- `require_login()`: Enforce authentication
- `require_admin()`: Enforce admin access
- `e()`: HTML escaping for XSS prevention
- `peso()`: Format amounts in Philippine Peso
- `flash()`: Set flash messages
- `show_flash()`: Display flash messages

## Browser Compatibility

Works on modern browsers:
- Chrome/Edge (recommended)
- Firefox
- Safari

## License

This project is proprietary software for dental center management.

## Support

For technical support or feature requests, please contact your system administrator.

---

**Version**: 1.0  
**Last Updated**: August 2026