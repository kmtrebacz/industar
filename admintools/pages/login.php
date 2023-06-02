<?php 
     session_start();

     $configFile = './../admin_config.json';

     if (!file_exists($configFile)) {
       die('Plik konfiguracyjny nie istnieje.');
     }
   
     $configData = file_get_contents($configFile);
     $config = json_decode($configData, true);
   
     if ($config === null) {
       die('Błąd odczytu danych z pliku konfiguracyjnego.');
     }


     if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
          header("Location: index.php");
          exit;
     }
      
     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
          $username = $_POST['username'];
          $password = $_POST['password'];
      
          if ($username === $config['ADMIN_NAME'] && $password === $config['ADMIN_PASS']) {
              $_SESSION['loggedin'] = true;
              header("Location: index.php");
              exit;
          } 
          else {
              $login_error = "Invalid username or password";
          }
     }
?>

<?php include './include/top.html';?>

<div class="content p-4">
     <h2>LOGIN</h2>

     <br>
     <?php if (isset($login_error)) { ?>
        <p><?php echo $login_error; ?></p>
     <?php } ?>

     <form method="post" action="login.php">
          <div class="py-1">
               <label for="username">Username:</label>
               <input type="text" id="username" name="username" required>
          </div>
          <div class="py-1">
               <label for="password">Password:</label>
               <input type="password" id="password" name="password" required>
          </div>

          <input type="submit" value="Login">

     </form>
</div>

<?php include './include/bottom.html';?>