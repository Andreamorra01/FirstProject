<?php
require_once 'myslqi.php';
$Id_Author = $_REQUEST['id'];
$sql = "SELECT * FROM author where id = ".$Id_Author;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      //var_dump($row);
    echo   "<span><strong>id: </strong>". $row["id"]. "  </span> - 
      <span><strong>Name pubblicazione:  </strong>" . $row["name"]. " </span> - 
      <span><strong>Surname pubblicazione:  </strong>" . $row["surname"]. " </span> - 
      <span><strong>Email pubblicazione:  </strong>" . $row["email"]. " </span>";
    }
  } else {
    echo "0 results";
    }

