<header>
  <!-- Search in navbar -->
  <a class="menu-item" id="home" href="index.php">Crave</a>
  <div class="menu-items-right">
    <form action="all-recipes.php" method="get" class="search-bar header-search">
      <input
        type="text"
        placeholder="Search"
        name="search"
        value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>"
      >
      <?php
        if (isset($_GET['filter']) && is_array($_GET['filter'])) {
          foreach ($_GET['filter'] as $f) {
            echo '<input type="hidden" name="filter[]" value="' . htmlspecialchars($f) . '">';
          }
        }
      ?>
      <button type="submit" aria-label="Search">
        <img src="assets/search.svg" alt="Search" width="24" height="24">
      </button>
      </form>
      <a class="menu-item" id="all-recipes" href="all-recipes.php">All Recipes</a>
      <a class="menu-item" id= "help" href="index.php#help-section">Help</a>
  </div>
</header>
