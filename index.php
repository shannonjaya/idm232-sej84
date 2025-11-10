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
            <svg
              width="36"
              height="36"
              viewBox="0 0 36 36"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <mask
                id="mask0_299_729"
                style="mask-type: alpha"
                maskUnits="userSpaceOnUse"
                x="0"
                y="0"
                width="36"
                height="36"
              >
                <rect width="36" height="36" fill="#D9D9D9" />
              </mask>
              <g mask="url(#mask0_299_729)">
                <path
                  d="M29.3133 30.8655L19.8922 21.444C19.1422 22.0633 18.2797 22.5479 17.3047 22.8979C16.3297 23.2479 15.3211 23.4229 14.2788 23.4229C11.7151 23.4229 9.54533 22.5353 7.76958 20.76C5.99383 18.9848 5.10596 16.8155 5.10596 14.2523C5.10596 11.6893 5.99358 9.51927 7.76883 7.74227C9.54408 5.96552 11.7133 5.07715 14.2766 5.07715C16.8396 5.07715 19.0096 5.96502 20.7866 7.74077C22.5633 9.51652 23.4517 11.6863 23.4517 14.25C23.4517 15.3213 23.272 16.3444 22.9125 17.3194C22.5527 18.2944 22.0728 19.1424 21.4728 19.8634L30.894 29.2845L29.3133 30.8655ZM14.2788 21.1733C16.2116 21.1733 17.8486 20.5025 19.1898 19.161C20.5313 17.8198 21.2021 16.1828 21.2021 14.25C21.2021 12.3173 20.5313 10.6803 19.1898 9.33902C17.8486 7.99752 16.2116 7.32677 14.2788 7.32677C12.3461 7.32677 10.7091 7.99752 9.36783 9.33902C8.02633 10.6803 7.35558 12.3173 7.35558 14.25C7.35558 16.1828 8.02633 17.8198 9.36783 19.161C10.7091 20.5025 12.3461 21.1733 14.2788 21.1733Z"
                  fill="#ea373d"
                />
              </g>
            </svg>
          </button>
        </form>

        <button type="button" class="mobile-filter-btn">
          <svg
            width="24"
            height="24"
            viewBox="0 0 24 24"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <mask
              style="mask-type: alpha"
              maskUnits="userSpaceOnUse"
              x="0"
              y="0"
              width="24"
              height="24"
            >
              <rect width="24" height="24" fill="#D9D9D9" />
            </mask>
            <g mask="url(#mask0_340_1438)">
              <path
                d="M11.25 20.75V15.25H12.75V17.25H20.75V18.75H12.75V20.75H11.25ZM3.25 18.75V17.25H8.75V18.75H3.25ZM7.25 14.75V12.75H3.25V11.25H7.25V9.25H8.75V14.75H7.25ZM11.25 12.75V11.25H20.75V12.75H11.25ZM15.25 8.75V3.25H16.75V5.25H20.75V6.75H16.75V8.75H15.25ZM3.25 6.75V5.25H12.75V6.75H3.25Z"
                fill="#EA373D"
              />
            </g>
          </svg>
          FILTER
        </button>

        <!-- Filter Form -->
        <form action="index.php" method="get" class="filter-form">
          <h3 class="filter-title">Filter By</h3>
          <div class="filter-options">
            <?php include "filter-options.php"; ?>
          </div>
          <button class="clear-filters-btn" type="button">Clear All</button>
          <div class="close-filters-btn">
            <svg
              width="36"
              height="36"
              viewBox="0 0 36 36"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <mask
                style="mask-type: alpha"
                maskUnits="userSpaceOnUse"
                x="0"
                y="0"
                width="36"
                height="36"
              >
                <rect width="36" height="36" fill="#D9D9D9" />
              </mask>
              <g mask="url(#mask0_340_2037)">
                <path
                  d="M9.60016 27.9805L8.01953 26.3999L16.4195 17.9999L8.01953 9.59991L9.60016 8.01929L18.0002 16.4193L26.4002 8.01929L27.9808 9.59991L19.5808 17.9999L27.9808 26.3999L26.4002 27.9805L18.0002 19.5805L9.60016 27.9805Z"
                  fill="#EA373D"
                />
              </g>
            </svg>
          </div>
        </form>
      </div>

      <!-- Recipe Cards -->
      <div class="recipe-container">
        <div class="recipe-cards-container">
          <?php 
          if (mysqli_num_rows($results) > 0) {
            while ($recipe = mysqli_fetch_assoc($results)) {
              include "recipe-card.php";
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
