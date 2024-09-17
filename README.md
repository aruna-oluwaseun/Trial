
### Public
1. Index.php - This is the index file where we have the form and the table.
2. Database.txt - is just a query to create the Vat Table.


### Src
 Actions - Directory.
  1. Clear.php - This contain logic to clear the data
  2. Requests.php - handles the logic that post Vat details to the database
  3. Export - handles logic for the export to Csv
 Database - Directory
   Database.php - handles database connection.
Vat - Directory
    1. VatCalculator.php - handles logic that calculates and saves vat data
Includes
   vatData.php - this pulls the data from database and puts in a table.
     
