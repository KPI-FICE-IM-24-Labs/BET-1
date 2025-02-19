<?php
$nl = "<br>";
$showLogs = (count(debug_backtrace()) === 0); // Check if file opened dirrectly or using require_once();

function logMessage($message)
{
  global $showLogs, $nl;
  if ($showLogs) {
    echo $message . $nl;
  }
}

try {
  $mysqli = new mysqli("localhost", "root");
  logMessage("Connection established successfully");

  $dbName = "Marks";
  $query = "CREATE DATABASE IF NOT EXISTS $dbName";
  $mysqli->query($query);
  logMessage("Database created successfully");

  $mysqli->select_db($dbName);

  $query = "GRANT ALL PRIVILEGES ON *.* TO 'admin'@'localhost' IDENTIFIED by 'admin' WITH GRANT OPTION";
  $mysqli->query($query);
  logMessage("User created successfully");

  $createTable = "CREATE TABLE IF NOT EXISTS students (
      id INT NOT NULL AUTO_INCREMENT, 
      PRIMARY KEY (id), 
      surname VARCHAR(25), 
      name VARCHAR(20), 
      group_name VARCHAR(20)
    )";
  $mysqli->query($createTable);
  logMessage("Table 'student' created successfully");
} catch (mysqli_sql_exception $error) {
  logMessage("Error: " . $error->getMessage());
}
