<?php

namespace Cmostores\Vat;

use Cmostores\Database\Database;

class VatCalculator
{
  private $connection;

  public function __construct(Database $db)
  {
  
    $this->connection = $db->connection();

        if ($this->connection->connect_error) {
            die("Failed to connect to the database: " . $this->conn->connect_error);
        } 
  
  }

  public function Calculate($amount, $vatRate)
  {
     $valueWithVatEx = $amount * (1 + $vatRate/100);
     $exVatAmount = $amount * $vatRate/100;
     $valueWithVatInc  = $amount / (1 + $vatRate/100);
     $incVatAmount = $amount -  $valueWithVatInc;

     return ['ExVat Value after Added' => $valueWithVatEx, 'ExVat Value' => $exVatAmount, 'IncVat Value after subracted' => $valueWithVatInc,  'IncVat Value' => $incVatAmount];
  }


  public function SaveVatDetails($amt, $vat)
  {
     $calculatedVat = $this->Calculate($amt,$vat);

     $originalValue= htmlspecialchars($amt, ENT_QUOTES, 'UTF-8');
     $valueWithVatAdded = htmlspecialchars($calculatedVat['ExVat Value after Added'], ENT_QUOTES, 'UTF-8');
     $ExvatCalcuted = htmlspecialchars($calculatedVat['ExVat Value'], ENT_QUOTES, 'UTF-8');
     $valueWithVatSubracted = htmlspecialchars($calculatedVat['IncVat Value after subracted'], ENT_QUOTES, 'UTF-8');
     $IncvatCalcuted = htmlspecialchars($calculatedVat['IncVat Value'], ENT_QUOTES, 'UTF-8');
     
      $statement = $this->connection->prepare("INSERT INTO vat (original_value, value_with_exvat, amt_vat_calculated_exvat, value_with_incvat,  amt_vat_calculated_incvat ) VALUES (?, ?, ?, ?, ?)");
  
      $statement->bind_param("sssss", $originalValue, $valueWithVatAdded, $ExvatCalcuted, $valueWithVatSubracted,$IncvatCalcuted );
      $result = $statement->execute();

     if ($result) {
        header('location:../../public/index.php');
        exit;
      } else {
        echo "Error: " . $statement->error;
      }

      $statement->close();
  }


}

?>