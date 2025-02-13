<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Marks</title>
</head>

<body>
  <?php require_once("./create_db.php");  
  $student_id = $_GET['studentId'];
  $getStudentById = "SELECT surname, name, group_name FROM students WHERE id = $student_id";
  $students = $mysqli->query($getStudentById);
  $student = $students->fetch_array();

  echo "$nl Student:$nl";
  echo $student['surname'] . " ";
  echo $student['name'] . " " . $student['group_name'] . $nl . $nl;

  $getAllMarks = "SELECT * FROM marks WHERE student_id = $student_id";
  $marks = $mysqli->query($getAllMarks);

  if (!$marks->num_rows > 0) {
    echo "No marks found$nl";
  }

  while ($row = $marks->fetch_array()) {
    echo "Subject: " . $row['subject'] . " " 
    . "Teacher: " . " " 
    . $row['teacher'] . " " 
    . "Ticket: " . " " 
    . $row['ticket_number'] . " " 
    .  "Mark: " . " " . $row['mark'] . $nl;
  }
  ?>
</body>

</html>