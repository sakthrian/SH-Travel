# Travel Website(SH-Travel)

## Overview
This travel website is a comprehensive platform designed to provide users with a seamless travel planning experience. 
The website allows users to search for destinations, book accommodations, and much more. 
It is developed with a focus on user-friendliness, security, and efficiency.

## Features
- **Destination Search**: Users can search for travel destinations with detailed information and images.
- **Accommodation Booking**: Integration with booking APIs to allow users to book hotels and other accommodations.
- **User Accounts**: Secure user authentication and profile management.
- **Multimedia Content**: Rich multimedia content to enhance user experience.
- **Email Notifications**: Email confirmations and notifications for bookings and itinerary changes.

## Technologies Used
- **Frontend**: HTML, CSS, JavaScript
- **Backend**: PHP
- **Database**: MySQL
- **APIs**: weather APIs, Email APIs (PHPMailer)
- **Simple Assistant**: Client-Server Communication(Websockets)

## Setup and Installation
### Prerequisites
- Web Server (Apache, Nginx)
- PHP 7.4 or higher
- MySQL 5.7 or higher

### Installation Steps
1. **Clone the Repository**
   ```sh
   git clone https://github.com/sakthrian/SH-Travel.git
   cd SH-Travel
   ```

2. **Install Dependencies**
   - **PHP Dependencies**
     ```sh
     composer install
     ```

3. **Database Setup**
   - Create a MySQL database and import the provided SQL file:
     ```sh
     mysql -u yourusername -p yourpassword travel_db < database/travel_db.sql
     ```
   - Update the database configuration in `config/database.php`:
     ```php
     define('DB_SERVER', 'localhost');
     define('DB_USERNAME', 'yourusername');
     define('DB_PASSWORD', 'yourpassword');
     define('DB_NAME', 'travel_db');
     ```

4. **Configuration**
   - Update the email configuration in `send.php` for PHPMailer:
     ```php
     $mail->Host = 'smtp.gmail.com';
     $mail->SMTPAuth = true;
     $mail->Username = 'your-email@gmail.com';
     $mail->Password = 'your-email-password';
     $mail->SMTPSecure = 'tls';
     $mail->Port = 587;
     ```

5. **Run the Application**
   - Start the web server and navigate to the project directory.
   - Access the website via `http://localhost/SH-Travel`.

## Usage
- **Search for Destinations**: Use the search bar to find travel destinations.
- **Book Accommodations**: Select and book accommodations through the integrated booking API.
- **User Profile**: Manage your account and profile settings.

## Contributing
We welcome contributions from the community. Please follow these steps to contribute:
1. Fork the repository.
2. Create a new branch (`git checkout -b feature/your-feature`).
3. Commit your changes (`git commit -m 'Add some feature'`).
4. Push to the branch (`git push origin feature/your-feature`).
5. Open a Pull Request.


## Contact
For any questions or issues, please contact us at [sakthrian.tpy@gmail.com].
