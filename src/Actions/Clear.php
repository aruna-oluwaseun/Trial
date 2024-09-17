<?php
   require_once '../Database/Database.php'; 
   use Cmostores\Database\Database;
   $db = new Database();
   $conn = $db->connection();
   $query = "update vat set cleared = 1 WHERE id != 0";
   $statement = $conn->prepare($query);
   if ($statement === false) 
   {
     die("Failed: " . $conn->error);
   }

  if ($statement->execute()) 
  {
    header('location:../../public/index.php');
    exit;
  } else 
  {
     echo "Error: " . $statement->error;
  }
?>