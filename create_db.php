<body>
  <?php
  // new line
  $nl = "<br>";

  try {
    // Connect to the server
    $mysqli = new mysqli("localhost", "root");
    echo "Connection established successfuly$nl";

    // Create new database
    $dbName = "Marks";
    $query = "CREATE DATABASE IF NOT EXISTS $dbName";
    $mysqli->query($query);
    echo "Database created successfuly$nl";

    // Select database
    $mysqli->select_db($dbName);

    // Create new user 'admin'
    $query = "GRANT ALL PRIVILEGES ON *.* TO 'admin'@'localhost' IDENTIFIED by 'admin' WITH GRANT OPTION";
    $mysqli->query($query);
    echo "User created successfuly$nl";

    // Створюємо таблицю
    $createTable = "CREATE TABLE IF NOT EXISTS students (
      id INT NOT NULL AUTO_INCREMENT, 
      PRIMARY KEY (id), 
      surname VARCHAR(25), 
      name VARCHAR(20), 
      group_name VARCHAR(20)
    )";
    $mysqli->query($createTable);
    echo "Table 'student' created successfuly$nl";
  } catch (mysqli_sql_exception $error) { // Handle errors
    echo "Error: " . $error->getMessage() . "$nl";
  }
  ?>
</body>