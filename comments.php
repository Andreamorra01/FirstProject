<?php
require_once 'myslqi.php';
echo "<br>";

function commentDetails($conn,$id_comment){


  $sql = "SELECT * FROM Comments2
  where Comments2.ID = ".$id_comment;

  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    while( $row = $result->fetch_assoc()){
      $comment = $row; // Inside while loop
    }
    
    return json_encode($comment);
    
 }
 return "0 results";

}

 function ListComment($conn){
  $sql = "SELECT Comments2.ID, testo FROM Comments2 ";

  $result = $conn->query($sql);
  while($row = $result->fetch_assoc()){
    $commets[] = $row;
  }
  return json_encode($comments);
}
echo "<br>";
 if(!isset($REQUEST["ID"])){
   echo ListComment($conn);
 }
 else{
   echo commentDetails($conn,$REQUEST["ID"]);
 }