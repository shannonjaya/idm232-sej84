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
        <h1 class="hero-title">Food worth craving...</h1>
      </div>
      <section class="home-featured">
        <?php include_once "includes/featured-recipe.php"; ?>
        <?php include_once "includes/featured-list.php"; ?>
      </section>
      <?php include_once "includes/help-section.php"; ?>
    </main>

    <!-- Footer -->
    <?php include_once "includes/footer.php";?>
    
    <!-- Close Connection -->
    <?php include_once "includes/db-close.php"; ?>
    
    <script src="scripts/main.js"></script>
  </body>
</html>
