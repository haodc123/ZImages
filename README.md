# ZImages - Photography & Video Services

A Laravel-based web application for photography and video services built with Docker.

## About the Technology Stack

This application is built with Laravel, a web application framework with expressive, elegant syntax. Laravel provides:

- [Simple, fast routing engine](https://laravel.com/docs/routing)
- [Powerful dependency injection container](https://laravel.com/docs/container)
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent)
- Database agnostic [schema migrations](https://laravel.com/docs/migrations)
- [Robust background job processing](https://laravel.com/docs/queues)
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting)

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Prerequisites

Before you begin, ensure you have the following installed on your local machine:

- [Docker](https://www.docker.com/get-started) (version 20.0 or higher)
- [Docker Compose](https://docs.docker.com/compose/install/) (version 2.0 or higher)
- [Git](https://git-scm.com/downloads)

## Quick Start

### 1. Clone the Repository

```bash
git clone <repository-url>
cd ZImages
```

### 2. Start the Application

```bash
docker compose up -d
```

This command will:
- Build and start all required containers (MySQL, PHP-FPM, Nginx, PHPMyAdmin, MailHog)
- Set up the database
- Configure the Laravel application

### 3. Set Up the Application

After the containers are running, execute the following commands:

```bash
# Generate Laravel application key
docker exec zphp php artisan key:generate

# Import the database structure and data
docker exec -i zdb mysql -u root -proot z < web/database/z.sql

# Clear configuration cache
docker exec zphp php artisan config:clear
```

### 4. Access the Application

- **Main Application**: http://localhost:81
- **PHPMyAdmin**: http://localhost:8081
- **MailHog** (Email testing): http://localhost:8025

## Services Overview

| Service | Container Name | Port | Description |
|---------|---------------|------|-------------|
| Web Application | znginx | 81 | Main Laravel application |
| PHP-FPM | zphp | 9000 | PHP processing |
| MySQL Database | zdb | 3309 | Database server |
| PHPMyAdmin | zimages-zphpmyadmin-1 | 8081 | Database management |
| MailHog | zimages-mailhog-1 | 8025 | Email testing |

## Database Configuration

The application uses MySQL with the following default credentials:

- **Host**: zdb (internal Docker network)
- **Database**: z
- **Username**: root
- **Password**: root
- **Port**: 3306 (internal), 3309 (external)

## Troubleshooting

### Common Issues

#### 1. Database Connection Timeout
If you encounter database timeout errors:

```bash
# Restart the database container
docker compose restart zdb

# Wait for MySQL to fully start (about 30 seconds)
# Then test the connection
docker exec zphp php -r "try { \$pdo = new PDO('mysql:host=zdb;dbname=z', 'root', 'root'); echo 'Connection successful\n'; } catch(Exception \$e) { echo 'Connection failed: ' . \$e->getMessage() . '\n'; }"
```

#### 2. Application Returns 500 Error
Check if the `.env` file exists and has correct database configuration:

```bash
# Check if .env file exists
docker exec zphp ls -la /var/www/.env

# If missing, generate application key (this creates .env)
docker exec zphp php artisan key:generate

# Verify database configuration
docker exec zphp cat /var/www/.env | grep DB_
```

#### 3. Missing Database Tables
If you get "Table doesn't exist" errors:

```bash
# Import the database
docker exec -i zdb mysql -u root -proot z < web/database/z.sql

# Verify tables exist
docker exec zdb mysql -u root -proot -e "USE z; SHOW TABLES;"
```

#### 4. Permission Issues
If you encounter file permission errors:

```bash
# Fix storage permissions
docker exec zphp chmod -R 777 /var/www/storage /var/www/bootstrap/cache
```

### Viewing Logs

```bash
# Application logs
docker exec zphp tail -f /var/www/storage/logs/laravel.log

# Container logs
docker logs znginx
docker logs zphp
docker logs zdb
```

## Development

### File Structure

```
ZImages/
├── web/                    # Laravel application
│   ├── app/               # Application code
│   ├── config/            # Configuration files
│   ├── database/          # Database files and migrations
│   │   └── z.sql         # Database dump
│   ├── public/            # Public assets
│   └── resources/         # Views and assets
├── docker/                # Docker configuration
│   ├── laravel-nginx/     # Nginx configuration
│   ├── laravel-php/       # PHP-FPM configuration
│   └── php-82/           # PHP configuration
├── config/               # Additional service configs
└── docker-compose.yml    # Docker Compose configuration
```

### Making Changes

1. **Code Changes**: Edit files in the `web/` directory
2. **Database Changes**: 
   - For structure: Create migrations in `web/database/migrations/`
   - For data: Update `web/database/z.sql`
3. **Configuration**: Modify files in `docker/` or `config/` directories

### Rebuilding Containers

If you make changes to Docker configuration:

```bash
# Rebuild and restart
docker compose down
docker compose up --build -d
```

## Production Deployment

For production deployment:

1. Update environment variables in `.env`
2. Set `APP_ENV=production` and `APP_DEBUG=false`
3. Configure proper SSL certificates
4. Use a production-grade database setup
5. Implement proper backup strategies

## Support

If you encounter issues:

1. Check the troubleshooting section above
2. Review container logs for error messages
3. Ensure all prerequisites are installed correctly
4. Verify Docker and Docker Compose are running properly

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
