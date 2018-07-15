<nav class="navbar">
  <!-- main-nav styles the format of the menu -->
  <div class = "main-nav">
    <ul class="nav">
      <?php
      $category;
      $article_id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
      $sql = "SELECT category FROM blogs WHERE id = :id";
      $params = array(
        ":id" => $article_id
      );
      $result = exec_sql_query($db, $sql, $params)->fetchAll();
      if (isset($result) AND !empty($result)) {
        $category = $result[0]['category'];
      }

      $pageArray = array(
        "home" => "index.php",
        "short essays" => "shortessays.php",
        "product" => "product.php",
        "nooks" => "nooks.php",
        "books" => "books.php"
      );
      foreach ($pageArray as $name => $link) {
        global $current_page_id;
        if (isset($category) AND $category == $name) {
          echo "<li class = 'menu-item'><a class = \"highlight-nav\"
          href = $link>$name</a></li>";
        }
        else if ($current_page_id == $name) {
          // highlight page in nav bar of current page
          // highlight-nav styles the individual label
          echo "<li class = 'menu-item'><a class = \"highlight-nav\"
          href = $link>$name</a></li>";
        }
        else {
          // norm-nav styles the individual label
          echo "<li class = 'menu-item'><a class = \"norm-nav\"
          href = $link>$name</a></li>";
        }
      }
       ?>
    </ul>
  </div>
</nav>
