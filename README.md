# Hotel Management System

A modern, dynamic hotel management website built with PHP, MySQL, HTML, CSS, and JavaScript.

## Features

- **User Registration and Login**: Secure user authentication with role-based access.
- **Admin Dashboard**: Manage users, bookings, and system data.
- **Room Booking**: Users can book rooms with date validation.
- **Responsive Design**: Modern, international design with gradients, flexbox, and mobile support.
- **Interactive Elements**: Smooth scrolling, form validation, lazy loading, and mobile menu.

## Installation

1. **Prerequisites**:
   - XAMPP or similar server with PHP and MySQL.
   - Web browser.

2. **Setup**:
   - Clone or download the project to `C:\xampp\htdocs\phploginform`.
   - Start XAMPP and ensure Apache and MySQL are running.
   - Open `http://localhost/phploginform/setup.php` in your browser to create the database and tables.
   - The setup will insert sample data.

3. **Access**:
   - Home: `http://localhost/phploginform/home.html`
   - Admin Login: `http://localhost/phploginform/admin.php`
   - User Login: `http://localhost/phploginform/userLogin.php`

## File Structure

- `setup.php`: Database setup.
- `connection.php`: Database connection.
- `header.php` & `footer.php`: Shared layout components.
- `login.php`: User registration.
- `userLogin.php`: User login.
- `admin.php`: Admin login.
- `adminDash.php`: Admin dashboard.
- `booking.php`: Booking form.
- Static pages: `about.php`, `menu.php`, etc.
- `styleCss.css`: Stylesheet.
- `script.js`: JavaScript enhancements.

## Technologies Used

- **Backend**: PHP 7+, MySQLi.
- **Frontend**: HTML5, CSS3 (with Roboto font), JavaScript (ES6+).
- **Libraries**: Font Awesome for icons, Google Fonts.

## Security Notes

- Uses prepared statements for SQL queries.
- Sessions for authentication.
- Input sanitization with `htmlspecialchars`.

## Future Enhancements

- User dashboard for booking history.
- Payment integration.
- Multi-language support.
- Email notifications.

## License

This project is for educational purposes.