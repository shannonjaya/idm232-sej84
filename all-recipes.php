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
    <?php require_once "includes/db.php"; ?>

    <!-- Search/Filter Logic -->
    <?php
      require_once "includes/search.php";
      $search_query = isset($_GET['search']) ? sanitizeInput($_GET['search']) : '';
      $results = performSearch($connection);
    ?>

    <!-- Header -->
    <?php include_once "includes/header.php"; ?>


    <main>
    <div class="hero">
        <h1 class="hero-title"> all recipes</h1>
    <div class="results">
      <?php
        $filters = isset($_GET['filter']) && is_array($_GET['filter']) ? $_GET['filter'] : [];
        if (!empty($filters)) {
          $selected_filter = array_map('htmlspecialchars', $filters);
        }
      ?>
        <?php
          $chips = [];

          $baseParams = [];
          if (!empty($filters)) {
            $baseParams['filter'] = $filters;
          }
          
          // Search chip
          if (!empty($search_query)) {
            $removeSearchParams = $baseParams; 
            $removeSearchUrl = 'all-recipes.php' . (empty($removeSearchParams) ? '' : ('?' . http_build_query($removeSearchParams)));
            $chips[] = '<span class="chip"><span class="body-text">&quot;' . htmlspecialchars($search_query) . '&quot;</span><a class="chip-close" href="' . $removeSearchUrl . '" aria-label="Remove search"><img src="assets/close.svg" alt="Remove" width="16" height="16"></a></span>';
          }

          // Filter chips
          if (!empty($filters)) {
            foreach ($filters as $f) {
              $remaining = array_values(array_filter($filters, function($x) use ($f) { return $x !== $f; }));
              $params = [];
              if (!empty($search_query)) {
                $params['search'] = $search_query;
              }
              if (!empty($remaining)) {
                $params['filter'] = $remaining;
              }
              $removeFilterUrl = 'all-recipes.php' . (empty($params) ? '' : ('?' . http_build_query($params)));
              $chips[] = '<span class="chip"><span class="body-text">' . htmlspecialchars($f) . '</span><a class="chip-close" href="' . $removeFilterUrl . '" aria-label="Remove filter"><img src="assets/close.svg" alt="Remove" width="24" height="24"></a></span>';
            }
          }
        ?>
        <?php if (!empty($chips)) : ?>
          <h3 class="results">Showing results for: <span class="body-text"><?php echo implode(' <span class="inline-divider"></span> ', $chips); ?></span></h3>
        <?php else : ?>
          <h3 class="results">Showing all results</h3>
        <?php endif; ?>
    </div>
        </div>
      
        <div class="recipes-container">
            <div class="filter-container">
            <button type="button" class="mobile-filter-btn">
              <img src="assets/filter.svg" alt="Filter" width="24" height="24" >
              FILTER
            </button>
            <!-- Filter Form -->
            <form action="all-recipes.php" method="get" class="filter-form">
              <input type="hidden" name="search" value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
              <div class="filter-header">
                <h3 class="filter-title">Filter By</h3>
                        <div class="close-filters-btn">
                  <img class="close-filters-icon" src="assets/close.svg" alt="Help" width="36" height="36" >
                </div>
              </div>
              <div class="filter-options">
                <?php include_once "includes/filter-options.php"; ?>
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
                  include "includes/recipe-card.php";
                  $recipe_card = ob_get_clean();
                  echo str_replace(["\n", "\r"], '', $recipe_card);
                }
              } else {
                include_once "includes/no-results.php";
              }
            
              ?>
            </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <?php include_once "includes/footer.php";?>
    
    <!-- Close Connection -->
    <?php
    include_once "includes/db-close.php";
    ?>
    
    <script src="scripts/main.js"></script>
  </body>
</html>
