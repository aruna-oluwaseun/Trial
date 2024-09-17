<?php
   require_once '../Database/Database.php'; 
   require_once '../Vat/VatCalculator.php';
   use  Cmostores\Vat\VatCalculator;
   use  Cmostores\Database\Database;

   $db = new Database();
   $vat = new VatCalculator($db);

   if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $amt = $_POST['amount'];
    $vatRate = $_POST['vat'];

    $vat->SaveVatDetails($amt, $vatRate);
} 
?>