# Instructions:

✈️ Flight Log SPA

A single-page application (SPA) for managing and viewing flight log entries. This project allows users to register, log in, and manage flight logs, including creating, viewing, updating, and deleting entries. The application is built using HTML5, CSS, JavaScript, SQL, and PHP, and uses XAMPP for local development.

# 🌟 Features
User Authentication (Register and Login)

Create, View, Update, and Delete Flight Log Entries

Automatic Calculation of Flight Duration

Search Flight Logs by flightID

Responsive Design with a Flight-Themed UI

SQL Database Integration with PHP Backend

Session Management for User Authentication

# 🛠️ Technologies Used

Frontend: HTML5, CSS, JavaScript

Backend: PHP

Database: MySQL (via XAMPP)

Local Server: XAMPP

# 📦 Prerequisites

XAMPP (includes Apache and MySQL)

Git for version control

A web browser (Chrome, Firefox, Edge)


# Set Up XAMPP:

Start Apache and MySQL services from the XAMPP Control Panel.

Database Setup:

Open phpMyAdmin in your browser.

Create a new database named flight_log_db.

Import the database schema:

Click on the SQL tab and run the contents of createtable.sql.

Run the contents of inserttable.sql to populate sample data.


Run the Application:

Open your browser and go to http://localhost/flight-log-app/index.html.

# 📖 Usage

Register: Create a new user account.

Login: Access your account using your credentials.

Dashboard: View all your flight logs.

Add New Log: Click "Add New Log" to create a new flight log entry.

Edit/Delete Log: Use the "Edit" or "Delete" buttons to modify or remove entries.

Search: Enter a flightID in the search bar to find specific flight logs.

# 🐞 Troubleshooting

Database Connection Error:

Ensure that XAMPP's Apache and MySQL services are running.

Verify that the database credentials in db.php are correct.

CSS Not Loading:

Check the styles.css file path in your HTML files.

Clear the browser cache and reload the page.

PHP Code Displayed as Plain Text:

Ensure the file extension is .php, not .html.
Access the file through localhost (e.g., http://localhost/flight-log-app/dashboard.php).