USE flight_log_db;

-- Insert sample users with real hashed passwords
INSERT INTO users (username, password)
VALUES 
('pilot1', '$2y$10$N3uJ1Xp0Q23G8Wy8L1k/Gu8i7J/YW4eAEx5ZibHjFyPZzL4nV2XQK'),
('pilot2', '$2y$10$0nJczYwY0aFzVx1LWfbFqe.EyFZ7Q.Jq2ypJitKgB7NNN6kA3mb9S');

-- Insert sample flight logs
INSERT INTO flight_logs (tailNumber, flightID, takeoff, landing, duration, userId)
VALUES
('N12345', 'FL123', '2024-11-01 09:00:00', '2024-11-01 12:00:00', '3h', 1),
('N67890', 'FL456', '2024-11-02 10:30:00', '2024-11-02 14:00:00', '3h 30m', 1),
('N54321', 'FL789', '2024-11-03 08:15:00', '2024-11-03 11:45:00', '3h 30m', 2),
('N98765', 'FL101', '2024-11-04 13:00:00', '2024-11-04 15:00:00', '2h', 2);
