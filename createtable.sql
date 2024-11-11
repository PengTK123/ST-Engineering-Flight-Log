USE flight_log_db;
-- Create the 'users' table
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL
);

-- Create the 'flight_logs' table
CREATE TABLE IF NOT EXISTS flight_logs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tailNumber VARCHAR(50) NOT NULL,
    flightID VARCHAR(50) NOT NULL,
    takeoff DATETIME NOT NULL,
    landing DATETIME NOT NULL,
    duration VARCHAR(20) NOT NULL,
    userId INT,
    FOREIGN KEY (userId) REFERENCES users(id) ON DELETE CASCADE
);
