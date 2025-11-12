<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crave</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.svg">
    <link rel="stylesheet" href="styles/styles.css">
    <link
      href="https://fonts.googleapis.com/css2?family=Readex+Pro:wght@160..700&display=swap"
      rel="stylesheet"
    >
  </head>
  <body>

    <!-- DB Connection -->
    <?php require_once "db.php"; ?>

    <!-- Search/Filter Logic -->
    <?php
    $search_query = isset($_GET['search']) ? $_GET['search'] : '';
    $filters = isset($_GET['filter']) ? $_GET['filter'] : [];

    $sql_query = "SELECT * FROM idm232_sej84 WHERE 1";

    if ($search_query) {
      $search_safe = mysqli_real_escape_string($connection, $search_query);
      $sql_query .= " AND (title LIKE '%$search_safe%' OR subtitle LIKE '%$search_safe%')";
    }

    if (!empty($filters)) {
      $filter_safe = array_map(function($f) use ($connection) {
        return mysqli_real_escape_string($connection, $f);
      }, $filters);
      $filter_list = "'" . implode("','", $filter_safe) . "'";
      $sql_query .= " AND protein IN ($filter_list)";
    }

    $results = mysqli_query($connection, $sql_query);
    ?>

    <!-- Header -->
    <?php include "header.php"; ?>

    <div class="hero">
      <img src="assets/hero-image.png" alt="Crave Hero" class="hero-img">
    </div>

    <main>
      <div class="search-filter-container">

        <!-- Search Form -->
        <form action="index.php" method="get" class="search-bar">
          <input
            type="text"
            placeholder="Find your next meal..."
            name="search"
            value="<?php echo htmlspecialchars($search_query); ?>"
          >
          <button type="submit" enabled aria-label="Search">
            <img src="assets/search.svg" alt="Search" width="36" height="36" />
          </button>
        </form>

        <button type="button" class="mobile-filter-btn">
          <img src="assets/filter.svg" alt="Filter" width="24" height="24" />
          FILTER
        </button>

        <!-- Filter Form -->
        <form action="index.php" method="get" class="filter-form">
          <div class="close-filters-btn">
            <img class="close-filters-icon" src="assets/close.svg" alt="Help" width="36" height="36" />
          </div>
          <h3 class="filter-title">Filter By</h3>
          <div class="filter-options">
            <?php include "filter-options.php"; ?>
          </div>
          <button class="clear-filters-btn" type="button">Clear All</button>
        </form>
      </div>

      <!-- Recipe Cards -->
      <div class="recipe-container">
        <div class="recipe-cards-container">
          <?php 
          if (mysqli_num_rows($results) > 0) {
            while ($recipe = mysqli_fetch_assoc($results)) {
              ob_start();
              include "recipe-card.php";
              $recipe_card = ob_get_clean();
              echo str_replace(["\n", "\r"], '', $recipe_card);
            }
          } else {
            include "no-results.php";
          }
          
          ?>
        </div>
      </div>
    </main>

    <!-- Footer -->
    <?php include "footer.php";?>
    
    <!-- Close Connection -->
    <?php
    mysqli_close($connection); 
    ?>
    
    <script src="scripts/main.js"></script>
  </body>
</html>
