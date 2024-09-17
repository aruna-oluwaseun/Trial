<?php
   require_once '../Database/Database.php'; 
   header('Content-Type: text/csv');
   header('Content-Disposition: attachment;filename="vats.csv"');
   use Cmostores\Database\Database;
   $db = new Database();
   $conn = $db->connection();
   $query = "select id, original_value,value_with_exvat,amt_vat_calculated_exvat,value_with_incvat, amt_vat_calculated_incvat from vat where cleared='0'";
   $statement = $conn->prepare($query);
   if ($statement === false) 
   {
     die("Failed: " . $conn->error);
   }

   $statement->execute();

   $result = $statement->get_result();

  $output = fopen('php://output', 'w');

  fputcsv($output, ['original_value','value_with_exvat','amt_vat_calculated_exvat','value_with_incvat', 'amt_vat_calculated_incvat']);

  while ($row = $result->fetch_assoc()) 
  {
    fputcsv($output, $row);
  }

  $statement->close();

  $conn->close();

  fclose($output);
?>