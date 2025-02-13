<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Students</title>
</head>

<body>
  <?php require_once("./create_db.php");
  $getAllStudents = "SELECT * FROM students";
  $records = $mysqli->query($getAllStudents);

  if (!$records->num_rows > 0) {
    echo "No records found$nl";
  }

  echo "$nl Students:$nl";
  while ($row = $records->fetch_array()) {
    echo $row['id'] . ". ";
  ?>
    <a href="./marks.php?studentId=<?php echo $row['id']; ?>">
      <?php
      echo $row['surname'] . " ";
      ?>
    </a>
  <?php
    echo $row['name'] . " " . $row['group_name'] . " " . $nl;
  }
  ?>
</body>

</html>