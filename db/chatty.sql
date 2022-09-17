-- creating users table
CREATE TABLE IF NOT EXISTS users (id INT PRIMARY KEY NOT NULL AUTO_INCREMENT, 
    first_name VARCHAR(20), last_name VARCHAR(20), full_name VARCHAR(55), email VARCHAR(255), password VARCHAR(255), avatar VARCHAR(255));