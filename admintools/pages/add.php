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
     <title>Add item</title>
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
                              <i class="bi bi-house" style="font-size: 24px;"></i>
                         </a>
                    </li>

                    <li class="nav-item">
                         <a href="./add.php" class="nav-link py-3 border-bottom" title="Add" data-bs-toggle="tooltip" 
                              data-bs-placement="right" style="border-radius: 0;">
                              <i class="bi bi-plus-lg" style="font-size: 24px;"></i>
                         </a>
                    </li>

                    <li class="nav-item">
                         <a href="./all_items.php" class="nav-link py-3 border-bottom" title="All items" data-bs-toggle="tooltip"
                              data-bs-placement="right" style="border-radius: 0;">
                              <i class="bi bi-list-ul" style="font-size: 24px;"></i>
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
               <!--
               ############
               # ADD ITEM #
               ############
               -->
               <?php
                    require_once './include/connect.php';

                    // Check if the form is submitted
                    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["item_submit"])) {
                        // Get the form data
                        $title = $_POST["name"];
                        $price = $_POST["price"];
                        $img_src = $_POST["img_src"];
                        $id_category = $_POST["id_category"];

                        $sql = "INSERT INTO products (name, price, img_src, id_category) VALUES ('$title', '$price', '$img_src', '$id_category')";

                        if ($conn->query($sql) === TRUE) {
                            echo "New item created successfully!";
                        } else {
                            echo "Error: " . $sql . "<br>" . $conn->error;
                        }
                    }
               ?>

               <form method="POST" class="border border-dark-subtle rounded p-2">

                    <h2>ADD ITEM</h2>

                    <div class="d-flex">
                         <section class="m-2">
                              <label for="name" style="height: 30px;">Name: </label><br>
                              <label for="price" style="height: 30px;">Price: </label><br>
                              <label for="img_src" style="height: 30px;">Image path: </label><br>
                              <label for="id_category" style="height: 30px;">Category's ID: </label>
                         </section>
                    
                         <section class="m-2">
                              <input type="text" name="name" id="name" required><br>
                              <input type="number" name="price" id="price" step="0.01" required><br>
                              <input type="text" name="img_src" id="img_src"><br>
                              <input type="number" name="id_category" id="id_category" step="1" min="0" required>
                         </section>
                    </div>

                    <input type="submit" value="Add item" name="item_submit">
               </form>

               <br><br>

               <!--
               ################
               # ADD CATEGORY #
               ################
               -->
               <?php
                    require_once './include/connect.php';

                    // Check if the form is submitted
                    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["category_submit"])) {
                        // Get the form data
                        $title = $_POST["name"];

                        $sql = "INSERT INTO products_category (name) VALUES ('$title')";

                        if ($conn->query($sql) === TRUE) {
                            echo "New item created successfully!";
                        } else {
                            echo "Error: " . $sql . "<br>" . $conn->error;
                        }
                    }
               ?>

               <form method="POST" class="border border-dark-subtle rounded p-2">

                    <h2>ADD CATEGORY</h2>

                    <div class="d-flex">
                         <section class="m-2">
                              <label for="name" style="height: 30px;">Name: </label>
                         </section>
                    
                         <section class="m-2">
                              <input type="text" name="name" id="name" required>
                         </section>
                    </div>

                    <input type="submit" value="Add category"  name="category_submit">
               </form>

          </div>

     </div>

     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
          integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
          crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/less"></script>
</body>

</html>