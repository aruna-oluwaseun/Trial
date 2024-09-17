<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vat Calculator</title>
</head>
<body> 

    <h1>Calculate Vat</h1>
    <form action = '../src/Actions/Requests.php'method="POST">
    
        <label for="amount">Amount:</label>
        <input type="text"  name="amount" required>
        <br><br>

        <label for="color">Vat Rate:</label>
        <select name="vat" required>
            <option value="">Vat Rate</option>
            <option value="5">5%</option>
            <option value="10">10%</option>
            <option value="20">20%</option>
            <option value="30">30%</option>
        </select>
        <br><br>

       
        <input type="submit" value="Submit">
    </form>
   <?php require_once '../src/includes/vatData.php'; ?>

   <form action='../src/Actions/clear.php', method='POST'>
     <input type='submit' value='clear'>
   </form>
  <br>

 <form action='../src/Actions/export.php', method='POST'>
    <input type='submit' value='export'>
 </form>
  
</body>
</html>
