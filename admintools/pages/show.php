<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>All items</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
     <link rel="stylesheet/less" type="text/css" href="./../../style/admin.less" />
     <link rel="stylesheet/less" type="text/css" href="./../../style/main.less" />
</head>

<body>

     <nav class="navbar bg-body-tertiary" style="background-color: #d5d5d5!important; padding: 10px;">
          <div class="container-fluid">
               <span class="navbar-brand mb-0 h1"><img src="./../../img/industar-logo.png" height="35px"></span>
          </div>
     </nav>

     <div class="d-flex">

          <div class="d-flex flex-column flex-shrink-0 vertical_nav" style="width: 4.5rem; height: calc(100vh - 65px);">

               <ul class="nav nav-pills nav-flush flex-column mb-auto text-center">

                    <li class="nav-item">
                         <a href="./index.php" class="nav-link py-3 border-bottom" title="Home" data-bs-toggle="tooltip"
                              data-bs-placement="right" style="border-radius: 0;">
                              <i class="bi bi-house-fill" style="font-size: 24px;"></i>
                         </a>
                    </li>

                    <li class="nav-item">
                         <a href="./add.php" class="nav-link py-3 border-bottom" title="Add item" data-bs-toggle="tooltip" 
                              data-bs-placement="right" style="border-radius: 0;">
                              <i class="bi bi-database-fill-add" style="font-size: 24px;"></i>
                         </a>
                    </li>

                    <li class="nav-item">
                         <a href="./show.php" class="nav-link active py-3 border-bottom" title="Show" data-bs-toggle="tooltip"
                              data-bs-placement="right" style="border-radius: 0;">
                              <i class="bi bi-table" style="font-size: 24px;"></i>
                         </a>
                    </li>
                    
                    <li class="nav-item">
                         <a href="./../../index.php" class="nav-link py-3 border-bottom" title="Shop main page" data-bs-toggle="tooltip"
                              data-bs-placement="right" style="border-radius: 0;">
                              <i class="bi bi-cart4" style="font-size: 24px;"></i>
                         </a>
                    </li>

                    <li class="nav-item">
                         <a href="./logout.php" class="nav-link py-3 border-bottom" title="Log out" data-bs-toggle="tooltip"
                              data-bs-placement="right" style="border-radius: 0;">
                              <i class="bi bi-power" style="font-size: 24px;"></i>
                         </a>
                    </li>

               </ul>
          </div>

          <div class="content p-4">
               <section class="border border-dark-subtle rounded p-2">

               <h2>ALL ITEMS</h2>

                <?php
                    require('./include/connect.php');

                    $query = "SELECT products.id, products.name, products.price, products_category.name AS 'category_name' FROM products JOIN products_category ON products_category.id = products.id_category";
                    $result = $conn->query($query);

                    if ($result->num_rows > 0) {
                        echo '<table class="table table-striped"><thead><tr><th scope="col">PRODUCT ID</th><th scope="col">PRODUCT NAME</th><th scope="col">PRODUCT PRICE</th><th scope="col">PRODUCT CATEGORY</th></tr></thead><tbody>';

                         while ($row = $result->fetch_assoc()) {
                            echo
                              '<tr><td>' .
                            $row['id']
                            . '</td><td>' .
                            $row['name']
                            . '</td><td>' .
                            $row['price']
                            . '</td><td>' .
                            $row['category_name']
                            . '</td></tr>';
                         }
                         echo '</tbody></table>';
                    } 
                    else {
                         echo 'Error: No products in the database';
                    }
                      
                      $conn->close();
                ?>
                </section>  

                <br><br>

                <section class="border border-dark-subtle rounded p-2">

                    <h2>ALL CATEGORY</h2>

                    <?php
                      require('./include/connect.php');

                      $query = "SELECT * FROM products_category";
                      $result = $conn->query($query);

                      if ($result->num_rows > 0) {
                          echo '<table class="table table-striped"><thead><tr><th scope="col">CATEGORY ID</th><th scope="col">NAME</th></tr></thead><tbody>';
                          while ($row = $result->fetch_assoc()) {
                              echo
                                '<tr><td>' .
                                $row['id']
                                . '</td><td>' .
                                $row['name']
                                . '</td></tr>';

                          }
                          echo '</tbody></table>';
                      }
                    ?>
                </section>

          </div>

     </div>

     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
          integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
          crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/less"></script>
</body>

</html>
