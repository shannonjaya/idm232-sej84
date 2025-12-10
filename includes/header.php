<header>
  <!-- Brand/Logo -->
  <div class="brand-container">
    <a class="logo" id="home" href="index.php">Crave</a>
  </div>
  
  <!-- Hamburger Menu Toggle -->
  <input type="checkbox" id="nav-toggle" class="nav-toggle">
  <label for="nav-toggle" class="nav-toggle-label">
    <span></span>
    <span></span>
    <span></span>
  </label>
  
  <!-- Navigation Menu -->
  <nav>
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
    <ul class="nav">
      <li class="nav-divider"><span class="divider"></span></li>
      <li><a href="all-recipes.php" class="menu-item">All Recipes</a></li>
      <li class="nav-divider"><span class="divider"></span></li>
      <li><a href="index.php#help-section" class="menu-item">Help</a></li>
    </ul>
  </nav>
</header>
