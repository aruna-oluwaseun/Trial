<?php
   require_once '../src/Database/Database.php'; 
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

  if ($result === false) 
  {
    die("Execution failed: " . $conn->error);
  }


echo '<table border="1">';
echo '<tr><th>ID</th><th>Original Amount</th><th>Value After Vat Added(ExVat)</th> <th>Vat Calculated(ExVat)</th> <th>Value After Vat Subracted(IncVat)</th> <th>Vat Calculated(IncVat)</th></tr>';

while ($row = $result->fetch_assoc()) {
     echo '<tr>';
     echo '<td>' . htmlspecialchars($row['id']) . '</td>';
     echo '<td>' . htmlspecialchars($row['original_value']) . '</td>';
     echo '<td>' . htmlspecialchars($row['value_with_exvat']) . '</td>';
     echo '<td>' . htmlspecialchars($row['amt_vat_calculated_exvat']) . '</td>';
     echo '<td>' . htmlspecialchars($row['value_with_incvat']) . '</td>';
     echo '<td>' . htmlspecialchars($row['amt_vat_calculated_incvat']) . '</td>';
     echo '</tr>';
}

echo '</table>';
?>