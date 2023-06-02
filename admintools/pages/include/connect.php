<?php
  $configFile = './../../pages/config.json';

  if (!file_exists($configFile)) {
    die('Plik konfiguracyjny nie istnieje.');
  }

  $configData = file_get_contents($configFile);
  $config = json_decode($configData, true);

  if ($config === null) {
    die('Błąd odczytu danych z pliku konfiguracyjnego.');
  }

  $host = 'localhost';
  $username = $config['DATABASE_ADMIN_USER'];
  $password = $config['DATABASE_ADMIN_PASSWORD'];
  $database = $config['DATABASE_NAME'];

  $conn = new mysqli($host, $username, $password, $database);

  if ($conn->connect_error) {
    die('Błąd połączenia: ' . $conn->connect_error);
  }

  $conn->set_charset('utf8');
?>