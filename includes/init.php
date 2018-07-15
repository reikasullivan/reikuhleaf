<?php

//Keep an array of error messages to track issues
$messages = array();
function record_message($message) {
  global $messages;
  array_push($messages, $message);
}

function print_message() {
  global $messages;
  foreach ($messages as $message) {
    echo '<p>' . htmlspecialchars($message) . '<p>\n';
  }
}

//Execute a SQL query to return results
function exec_sql_query($db, $sql, $params = array()) {
  try {
    $query = $db->prepare($sql); //TODO: WHAT DOES THIS MEAN
    if ($query and $query->execute($params)) { //TODO: WHAT DOES THIS MEAN
      return $query;
    }
  }
  catch (PDOException $exception){
    handle_db_error($exception);
  }
  return NULL;
}

//Show database errors during development
function handle_db_error($exception) {
  echo '<p>' . htmlspecialchars('Exception: ' . $exception->getMessage()) . '</p>';
}

//Open connection to database
function open_or_init_sqlite_db($db_filename, $init_sql_filename) {
  if (!file_exists($db_filename)) {
    $db = new PDO('sqlite:' . $db_filename);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //TODO what does this mean

    $db_init_sql = file_get_contents($init_sql_filename); //TODO: what does this mean
    if ($db_init_sql) {
      try {
        $result = $db->exec($db_init_sql);
        if ($result) {
          return $db;
        }
      }
      catch (PDOException $exception) {
        //If we had an error, the DB did not initialize properly. Let's delete!
        unlink($db_filename);
        throw $exception;
      }
    }
  }
  else {
    $db = new PDO('sqlite:' . $db_filename);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $db;
  }
  return null;
}

$db = open_or_init_sqlite_db('blogs.sqlite', "init/init.sql");

function check_login() {
  if (isset($_SESSION['current_user'])) {
    return $_SESSION['current_user'];
  }
  return null;
}

function log_in($username, $password) {
  global $db;
  $db->beginTransaction();
  if ($username AND $password) {
    $sql = "SELECT * FROM users WHERE username = :username;";
    $params = array(
      ':username' => $username
    );
    $records = exec_sql_query($db, $sql, $params)->fetchAll();
    if ($records) {
      $account = $records[0];
      if (password_verify($password, $account['password'])) {
        session_regenerate_id();
        $_SESSION['current_user'] = $username;
        record_message("Logged in as $username");
        return $username;
      }
      else {
        record_message("Incorrect username or password.");
      }
    }
    else {
      record_message("Incorrect username or password.");
    }
  }
  else {
    record_message("Incorrect username or password.");
  }
  $db->commit();
  return NULL;
}

function log_out() {
  global $current_user;
  $current_user = NULL;
  unset($_SESSION['current_user']);
  session_destroy();
}

function print_blogs($records, $current_page_id) {
  foreach ($records as $record) {
    echo "<a class = 'article-link' href = article.php?id=" . $record['id'] . ">";
    echo "<div class = 'article-home'>";
    echo "<p class = 'date'> datum: " . $record['blog_date'] . "</p>";
    echo "<p class = 'blog-title'>" . $record['title'] . "</p>";
    echo "<div class = 'article-content'>";
    echo "<p class = 'blog-content'>" . $record['content'] . "</p>";
    echo "</div>";
    echo "</div>";
    echo "</a>";
    if ($current_page_id == "home") {
      echo "<div class = 'tag-label'>";
      echo "<p class = 'tag'>". $record['category'] . "</p>";
      echo "</div>";
    }
  }
}

session_start();

if (isset($_POST['login'])) {
  $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
  $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
  $username = trim($username);
  $current_user = log_in($username, $password);
}
else {
  $current_user = check_login();
} ?>
