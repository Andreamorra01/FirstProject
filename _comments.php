<?php
require_once 'myslqi.php';
echo "<br>";

$id_post= $_REQUEST['id_post'];

if(!isset($id_post)){
  $sql = "SELECT Comments2.ID, testo FROM Comments2";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    //var_dump($row);
    echo "
    <span><strong>ID: </strong>". $row["ID"]. "  </span> - 
    <span><strong>testo pubblicazione:  </strong>" . $row["testo"]. " </span> - 
    </span> <a href='http://localhost/comments.php?id=".$row["ID"]."'>vai</a><br>";
  }
} else {
  echo "0 results";
  }

}else {
  $sql = "SELECT Comments2.ID, testo FROM Comments2
  INNER JOIN post on post.ID = Comments2.ID_post 
  WHERE Comments2.ID_post =".$id_post;

   $result = $conn->query($sql);
   if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo "<h1>".$row["testo"]."</h1>";
    }
  } else {
    echo "0 results";
    }
}


