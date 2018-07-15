<?php include('includes/init.php');

global $db;

$article_id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

$sql = "SELECT title, content, blog_date FROM blogs WHERE id = :id";
$params = array(
  ":id" => $article_id
);
$records = exec_sql_query($db, $sql, $params)->fetchAll(PDO::FETCH_ASSOC);

if (isset($records) AND !empty($records)) {
  $title = $records[0]['title'];
  $content = $records[0]['content'];
  $date = $records[0]['blog_date'];
}

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <link rel="stylesheet" type="text/css" href="styles/all.css" media="all" />

  <title>Article</title>
</head>

<body>
  <?php
  include('includes/header.php');
  include('includes/navbar.php');

  if (isset($date) AND isset($title) AND isset($content)) {

    echo "<div class = 'date_title'>";
    echo "<p class = 'date'>$date</p>";
    echo "<p class = 'title'>$title</p>";
    echo "</div>";

    echo "<div class = 'content'>";
    echo "<p class = 'text'>$content</p>";
    echo "</div>";
  }
  else {
    echo "<p class = 'error'>Oops! Content Not Found.</p>";
  }

  ?>
</body>
</html>
