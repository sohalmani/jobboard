# Job Board Platform

A modern and responsive job board platform built with PHP, MySQL, and Bootstrap. This platform allows employers to post jobs and job seekers to find and apply for positions.

## Features

### For Job Seekers
- Clean and responsive user interface
- Advanced job search with multiple filters
  - Search by keyword
  - Filter by location
  - Filter by job type (Full-time/Part-time)
- Detailed job view pages
- Easy application process
- Mobile-friendly interface
- User account management

### For Employers
- Intuitive job posting interface
- Rich text editor for job descriptions
- Company logo upload
- Job management dashboard
- Edit and delete job postings
- Track job views and applications

### System Features
- Secure user authentication
- CSRF protection
- Input validation and sanitization
- Responsive design
- Clean URL structure
- Error handling and user feedback
- Session management
- Database security
- Social media integration
- Mobile-friendly interface

## Project Structure

```
jobboard/
├── assets/
│   ├── css/
│   │   ├── animate.min.css
│   │   ├── bootstrap.min.css
│   │   ├── ...
│   │   └── style.css
│   ├── fonts/
│   │   └── icomoon/
│   │       ├── icomoon.eot
│   │       ├── icomoon.svg
│   │       ├── icomoon.ttf
│   │       └── icomoon.woff
│   ├── images/
│   │   ├── hero_1.jpg
│   │   ├── job_logo_*.jpg
│   │   └── person_*.jpg
│   │   └── ...
│   └── js/
│       ├── bootstrap.min.js
│       ├── jquery.min.js
│       ├── ...
│       └── custom.js
├── pages/
│   ├── about.php
│   ├── contact.php
│   ├── jobs.php
│   ├── ...
│   └── services.php
├── .editorconfig
├── index.php
└── README.md
```

## Technology Stack

- **Backend**: PHP 8.0+
- **Database**: MySQL 5.7+
- **Frontend**: 
  - HTML5
  - CSS3
  - Bootstrap 4
  - jQuery
- **Libraries**:
  - Quill.js for rich text editing
  - Bootstrap Select for enhanced dropdowns
  - Owl Carousel for sliders
  - Animate.css for animations
  - IcoMoon for icons

## Installation

1. Clone the repository:
```bash
git clone https://github.com/sohalmani/jobboard.git
cd jobboard
```

2. Set up your web server (Apache/Nginx) to point to the project directory

3. Create a MySQL database and import the schema:
```bash
mysql -u root -p
CREATE DATABASE jobboard;
USE jobboard;
SOURCE schema.sql;
```

4. Configure your database connection in `config.php`

5. Ensure proper permissions:
```bash
chmod 755 assets/images
```

## Configuration

The main configuration file `config.php` contains:
- Database credentials
- Site settings
- Email configuration
- Upload paths
- Security settings

## Security Features

- Password hashing using PHP's password_hash()
- CSRF protection on all forms
- Input validation and sanitization
- Prepared SQL statements
- Session security
- File upload validation
- XSS protection

## Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Opera (latest)

## Contributing

1. Fork the project
2. Create your feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## Acknowledgments

- Animate CSS
- Bootstrap framework
- IcoMoon Icons
- jQuery library
- Owl Carousel
- Quill Editor

## Template Credits & Copyright

This template is made by [Colorlib](https://colorlib.com/wp/templates/). For more awesome templates please visit https://colorlib.com/wp/templates/

**Copyright Notice:** Copyright information for the template can't be altered/removed unless you purchase a license. Removing copyright information without the license will result in suspension of your hosting and/or domain name(s). More information about the license is available here: https://colorlib.com/wp/licence/