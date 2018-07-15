<?php include('includes/init.php');
$current_page_id = "product" ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <link rel="stylesheet" type="text/css" href="styles/all.css" media="all" />

  <title>Short Essays</title>
</head>

<body>
  <?php
  include('includes/header.php');
  include('includes/headerphoto.php');
  include('includes/navbar.php');
  $sql = "SELECT * FROM blogs WHERE category = :category";
  $params = array(
    ":category" => "product"
  );
  $records = exec_sql_query($db, $sql, $params);
  print_blogs($records, $current_page_id);
  ?>
</body>
</html>
