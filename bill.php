<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Bill</title>
</head>
<body>
     
     <?php
     if (isset($_POST['bill'])) {
          $bill = $_POST['bill'];
          echo $bill;
     } else {
          echo "No bill data found.";
     }
     ?>

     <script src="./scripts/main.js"></script>
</body>
</html>
