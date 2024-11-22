<?php
if (!defined('ALLOW_INCLUDE')) {
  die('Direct access not allowed!');
}
$serverName = "localhost";
$username = "root";
$password = "";
$dbName = "online_voting_pool";

$conn = new mysqli($serverName, $username, $password, $dbName);

if ($conn->connect_error) {
  die("Connection Failed: " . $conn->connect_error);
}

$sql_users = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
";

$sql_voting_pool = "CREATE TABLE IF NOT EXISTS voting_pool (
    id INT AUTO_INCREMENT PRIMARY KEY,
    author INT NOT NULL,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (author) REFERENCES users(id) ON DELETE CASCADE
);";

$sql_voting_field = "CREATE TABLE IF NOT EXISTS voting_field (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pool_id INT NOT NULL,
    name VARCHAR(255) NOT NULL,
    image TEXT NOT NULL,
    votes INT,
    FOREIGN KEY (pool_id) REFERENCES voting_pool(id) ON DELETE CASCADE
);";

$sql_votes = "CREATE TABLE IF NOT EXISTS votes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    pool_id INT NOT NULL,
    vote INT NOT NULL,
    name VARCHAR(255) NOT NULL,
    image TEXT NOT NULL,
    votes INT,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (pool_id) REFERENCES voting_pool(id) ON DELETE CASCADE,
    FOREIGN KEY (vote) REFERENCES voting_field(id) ON DELETE CASCADE
);";

if ($conn->query($sql_users) !== TRUE) {
  echo "Error creating users table: " . $conn->error;
}

if ($conn->query($sql_voting_pool) !== TRUE) {
  echo "Error creating voting_pool table: " . $conn->error;
}

if ($conn->query($sql_voting_field) !== TRUE) {
  echo "Error creating voting_field table: " . $conn->error;
}

if ($conn->query($sql_votes) !== TRUE) {
  echo "Error creating votes table: " . $conn->error;
}
