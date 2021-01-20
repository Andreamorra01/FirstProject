<html>
<head>
<title>Home page</title>
</head>
<body>

<?php
//phpinfo();
require_once 'myslqi.php';

echo "<br><br><br>";

$Id_post = $_REQUEST['id'];
//$sql = "SELECT * FROM post where ID = ".$Id_post;

if(!isset($_REQUEST['id'])){

$sql = "SELECT post.ID,Description,data,name FROM post 
order by data desc ";

$result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      //var_dump($row);
      echo "
      <span><strong>Name: </strong>". $row["name"]. "  </span> - 
      <span><strong>Data pubblicazione:  </strong>" . $row["data"]. " </span> - 
      </span> <a href='http://localhost/posts.php?id=".$row["ID"]."'>vai al post</a><br>";
    }
  } else {
    echo "0 results";
    }

}else{

  $sql = "SELECT post.ID, post.name,Description,data FROM post 
  inner join author on author.id = post.ID_Author  
  where post.ID = ". $Id_post."
  order by data desc ";


  $result = $conn->query($sql);
  
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        echo "<h1>".$row["name"]."</h1><span>".$row["Description"]."</span><br>
        <a href='http://localhost/comments.php?id_post=".$row["ID"]."'>vai ai commenti del post</a><br>";
      }
    } else {
      echo "0 results";
      }
      
}




