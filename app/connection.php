<?php
    require __DIR__ . '/vendor/autoload.php';

    $dotenv = Dotenv\Dotenv::createUnsafeImmutable(__DIR__);
    $dotenv->load();

    $host = getenv('MYQSL_HOST');
    $port = getenv('MYQSL_PORT');
    $database = getenv('MYQSL_DATABASE');
    $username = getenv('MYQSL_USERNAME');
    $password = getenv('MYQSL_PASSWORD');
   
    // Create connection
    $connection = mysqli_connect($host, $username, $password, $database, $port);

    // Check connection
    if (!$connection) {
          die("Connection failed: " . mysqli_connect_error());
    }
?>