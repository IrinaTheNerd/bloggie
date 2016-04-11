<?php

include_once("config.php");
include_once("../include/header.php");
try
 {
  $name="%".$_GET["search"]."%";
  $stmt = $conn->prepare("SELECT title, subtitle, preview FROM blogpost where title LIKE :name");
  $stmt->bindParam(":name",$name);

  $stmt->execute();

  $result = $stmt->fetchAll();

  if( ! $result)
  {
   print('No Records Found');
  }
  else
  {
   /*
   $cc=$stmt->columnCount(); // count total number of columns
   $rc=$stmt->rowCount();  // count total number of rows
   echo "row count = $rc";
   echo "Column count = $cc";
   */
   echo "<section>";
   //while($row = $stmt->fetch())
   foreach($result as $row)
   {

     echo $row['title'];
     echo $row['subtitle'];
     echo $row['preview'];

     $search_str=$row['id'];
     echo "<a href='view.php?id=$search_str'>Edit</a>";

   }
   echo "</section>";
  }
 }
 catch(PDOException $e)
 {
  echo "Error: " . $e->getMessage();
 }
 $conn = null;
 echo "</section>";

 include_once("../include/footer.php");
 ?>
