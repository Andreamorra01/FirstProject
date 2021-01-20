<?php

require_once 'myslqi.php';

//formato json
function authorDetails($conn,$idAuthor){
 

  $sql = "SELECT * FROM author where id = ".$idAuthor;


  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    echo $row;
    while( $row = $result->fetch_assoc()){
      $author = $row; // Inside while loop
    }
    
    return json_encode($author);
 }
 return "0 results";
}



function listaAuthor($conn){

$sql = "SELECT author.id,author.name,surname,email FROM author";

$result = $conn->query($sql);

while( $row = $result->fetch_assoc()){
  $authors[] = $row; // Inside while loop
}

return json_encode($authors);
}



echo "<br>";
//ritorna la lista dei post in formato json
if(!isset($_REQUEST["id"])) { 

  echo listaAuthor($conn);
  
}else {

  echo authorDetails($conn,$_REQUEST["id"]);

}
