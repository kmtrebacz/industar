<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Bill</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
     <link rel="stylesheet/less" type="text/css" href="./style/main.less" />
     <link rel="stylesheet/less" type="text/css" href="./style/bill.less" />
</head>
<body>

     <?php include './include/navbar.html';?>
     
     <div class="col-3 mx-auto pt-3">
          <?php
          if (isset($_POST['bill'])) {
               $bill = $_POST['bill'];
               echo $bill;
          } else {
               echo "No bill data found.";
          }
          ?>
     </div>

     <div class="col-12 px-2">
          <form action="./index.php">
               <input type="submit" value="Back to main page" class="back">
          </form> 
     </div>

     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/less" ></script>
     <script src="./scripts/main.js"></script>
</body>
</html>
