<html>
<head>
<title>Home page</title>
</head>
<body>

<?php
//phpinfo();
require_once 'myslqi.php';


function postDetails($conn,$idPost){


  $sql = "SELECT * FROM post 
  where post.ID = ".$idPost."
  order by data desc ";

  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    while( $row = $result->fetch_assoc()){
      $post = $row; // Inside while loop
    }
    
    return json_encode($post);
 }
 return "0 results";
}



function listaPost($conn){

$sql = "SELECT post.ID,Description,data,name FROM post 
order by data desc ";

$result = $conn->query($sql);

while( $row = $result->fetch_assoc()){
  $posts[] = $row; // Inside while loop
}

return json_encode($posts);
}



echo "<br>";
//ritorna la lista dei post in formato json
if(!isset($_REQUEST["id"])) { 

  echo listaPost($conn);
  
}else {

  echo postDetails($conn,$_REQUEST["id"]);

}
