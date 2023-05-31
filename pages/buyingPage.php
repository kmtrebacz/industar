<!doctype html>
<html lang="en">

<head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>Buying Page</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
     <link rel="stylesheet/less" type="text/css" href="./../style/main.less" />
     <link rel="stylesheet/less" type="text/css" href="./../style/buyingPage.less" />
          
</head>

<body>

     <?php include './../include/navbar.html';?>

     <main>

          <div id="top">
               <div class="col-7">
                    <?php
                      require('./../include/connect.php');

                      $query = "SELECT name, price FROM products";
                      $result = $conn->query($query);

                      if ($result->num_rows > 0) {
                        echo '<div class="row">';

                        while ($row = $result->fetch_assoc()) {
                          $formattedPrice = number_format($row['price'], 2, '.', '');
                          echo 
                            '<div class="col-3 p-4 avaliableItem" data-product-price="' .
                            $formattedPrice
                            . '" data-product-name="' .
                            $row['name']
                            . '"><div class="content"><div class="img"></div><div class="price">' . 
                            $formattedPrice 
                            . '</div></div><div class="name">' . 
                            $row['name']
                            . '</div></div>';
                        }
                        echo '</div>';
                      } 
                      else {
                        echo 'Error: No products in the database';
                      }
                      
                      $conn->close();
                    ?>
               </div>


               <div class="col-5 selected_items">

               </div>
          </div>

          <div id="bottom">
               <div class="col-7">
                    <div class="d-flex">

                         <div class="col-6 actionButton cancel">Cancel</div>
                         <div class="col-6 actionButton pay">Pay</div>

                    </div>
               </div>

               <div class="col-5">
                    <div class="d-flex">
                         <span class="col-12 finalPrice">0</span>
                    </div>
               </div>
          </div>

     </main>

     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
          integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
          crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/less" ></script>
     <script src="./../scripts/main.js"></script>
</body>

</html>
