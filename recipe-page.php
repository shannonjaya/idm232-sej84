<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crave | Ancho-Orange Chicken Recipe</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.svg">
    <link rel="stylesheet" href="styles/styles.css">
    <link
      href="https://fonts.googleapis.com/css2?family=Readex+Pro:wght@160..700&display=swap"
      rel="stylesheet"
    >
  </head>
  <body>
    <!-- DB Connection and Data Fetch -->
    <?php
      require_once "includes/db.php";

      $recipe_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

      if ($recipe_id > 0) {
        $sql_query = "SELECT * FROM `idm232_recipes` WHERE id = $recipe_id";
        $result = mysqli_query($connection, $sql_query);

        if ($result && mysqli_num_rows($result) > 0) {
          $recipe = mysqli_fetch_assoc($result);
        } else {
  
          echo "Recipe not found.";
          exit;
        }
      } else {
        echo "Invalid recipe ID.";
        exit;
      }
      ?>

    <!-- Header -->
    <?php include_once "includes/header.php"; ?>

    <main class="recipe-page-main">
      <div class="page-header">
        <h1 class="page-heading"><?php echo $recipe['title']; ?></h1>
        <h4 class="page-subtitle"><?php echo $recipe['subtitle']; ?></h4>
        <div class="recipe-info">
          <span class="recipe-time">
            <svg
              class="time-icon"
              width="28"
              height="28"
              viewBox="0 0 28 28"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <mask
                style="mask-type: alpha"
                maskUnits="userSpaceOnUse"
                x="0"
                y="0"
                width="28"
                height="28"
              >
                <rect
                  y="0.224915"
                  width="27.3799"
                  height="27.3799"
                  fill="#D9D9D9"
                />
              </mask>
              <g mask="url(#mask0_278_427)">
                <path
                  d="M14.2607 13.6778V8.78111C14.2607 8.61949 14.206 8.48402 14.0965 8.37469C13.9869 8.26536 13.8513 8.21069 13.6895 8.21069C13.5277 8.21069 13.3923 8.26536 13.2833 8.37469C13.1744 8.48402 13.1199 8.61949 13.1199 8.78111V13.7765C13.1199 13.8931 13.1411 14.006 13.1835 14.1153C13.2259 14.2245 13.2968 14.3288 13.3963 14.4282L17.4462 18.4782C17.5531 18.585 17.684 18.6421 17.839 18.6493C17.9941 18.6565 18.1323 18.5995 18.2537 18.4782C18.375 18.3569 18.4356 18.2223 18.4356 18.0746C18.4356 17.9269 18.375 17.7922 18.2537 17.6707L14.2607 13.6778ZM13.694 24.1823C12.2743 24.1823 10.9394 23.9129 9.68943 23.374C8.43965 22.8352 7.35244 22.1039 6.4278 21.1802C5.50316 20.2565 4.77122 19.1703 4.23199 17.9214C3.69256 16.6728 3.42285 15.3385 3.42285 13.9186C3.42285 12.4988 3.69228 11.1639 4.23113 9.91395C4.76998 8.66417 5.50126 7.57696 6.42495 6.65232C7.34864 5.72767 8.4349 4.99574 9.68373 4.4565C10.9324 3.91708 12.2667 3.64737 13.6866 3.64737C15.1064 3.64737 16.4413 3.9168 17.6912 4.45565C18.941 4.9945 20.0282 5.72577 20.9529 6.64947C21.8775 7.57316 22.6094 8.65942 23.1487 9.90825C23.6881 11.1569 23.9578 12.4912 23.9578 13.9111C23.9578 15.3309 23.6884 16.6658 23.1495 17.9157C22.6107 19.1655 21.8794 20.2527 20.9557 21.1774C20.032 22.102 18.9458 22.834 17.6969 23.3732C16.4483 23.9126 15.114 24.1823 13.694 24.1823ZM13.6903 23.0415C16.2192 23.0415 18.3725 22.1526 20.1503 20.3748C21.9281 18.597 22.817 16.4437 22.817 13.9148C22.817 11.386 21.9281 9.23269 20.1503 7.45489C18.3725 5.6771 16.2192 4.7882 13.6903 4.7882C11.1615 4.7882 9.00817 5.6771 7.23037 7.45489C5.45258 9.23269 4.56368 11.386 4.56368 13.9148C4.56368 16.4437 5.45258 18.597 7.23037 20.3748C9.00817 22.1526 11.1615 23.0415 13.6903 23.0415Z"
                  fill="#909090"
                />
              </g>
            </svg>
            <?php echo $recipe['cook_time']; ?> min
          </span>
          <div class="divider"></div>
          <span class="recipe-servings"><?php echo $recipe['servings']; ?> servings</span>
          <div class="divider"></div>
          <span class="recipe-calories"><?php echo $recipe['calories']; ?> calories</span>
        </div>
      </div>
      <div class="recipe-container">
        <!-- Description -->
        <div class="text-image-container" id="overview">
          <div class="text-column">
            <h2 class="title">Overview</h2>
            <p class="description">
              <?php echo $recipe['description']; ?>
            </p>
          </div>
          <div class="image-column">
            <img
              class="recipe-image-large"
              src="<?php echo 'assets/recipe-images/' . $recipe['id'] . '/' . $recipe['main_image']; ?>"
              alt="Plated Ancho-Orange Chicken with kale rice and roasted carrots"
            >
          </div>
        </div>

        <!-- Ingredients -->
        <div class="text-image-container" id="ingredients">
          <div class="text-column">
            <h2 class="title">Ingredients</h2>
            <ul class="ingredients-list">
              <?php
              // Ingredient List
              for ($i = 1; $i <= 20; $i++) {
                $key = 'ingredient_' . $i;
                if (!empty($recipe[$key])) {
                  echo '<li>' . htmlspecialchars($recipe[$key]) . '</li>';
                }
              }
              ?>
            </ul>
          </div>
          <div class="image-column">
              <img
                class="recipe-image-large"
                src="<?php echo 'assets/recipe-images/' . $recipe['id'] . '/' . $recipe['ingredients_image']; ?>"
                alt="Ingredients for Ancho-Orange Chicken"
              >
          </div>
        </div>
        
        <!-- Steps -->
        <?php 
        $step_images = isset($recipe['steps_images']) ? explode('*', $recipe['steps_images']) : [];
        $max_steps = max(count($step_images), 20); // Support up to 20 steps
        for ($i = 1; $i <= $max_steps; $i++) {
          $title = isset($recipe['step_title_' . $i]) ? trim($recipe['step_title_' . $i]) : '';
          $desc = isset($recipe['step_desc_' . $i]) ? trim($recipe['step_desc_' . $i]) : '';
          $img = isset($step_images[$i-1]) ? trim($step_images[$i-1]) : '';
          // Only show if there is a title, description, or image
          if ($title || $desc || $img) {
            echo '<div class="text-image-container" id="step-' . $i . '">';
            echo '<div class="text-column">';
            echo '<h2 class="title">' . ($title ? htmlspecialchars($title) : 'Step ' . $i) . '</h2>';
            echo '<p class="description">' . $desc . '</p>';
            echo '</div>';
            echo '<div class="image-column">';
            if ($img) {
              echo '<img class="recipe-image-large" src="assets/recipe-images/' . $recipe['id'] . '/' . htmlspecialchars($img) . '" alt="Step ' . $i . ' image">';
            } elseif ($i == $max_steps) {
              echo '<img class="recipe-image-large" src="assets/end-image.png" alt="End image">';
            }
            echo '</div>';
            echo '</div>';
          }
        }
        ?>
      </div>

      <!-- Table of Contents -->
      <div class="table-of-contents-container">
        <div class="table-of-contents-card">
          <h3>Contents</h3>
          <button type="button" class="content-btn" data-target="overview">Overview</button>
          <button type="button" class="content-btn" data-target="ingredients">Ingredients</button>
          <?php
          // Show only what exists
          for ($i = 1; $i <= $max_steps; $i++) {
            $title = isset($recipe['step_title_' . $i]) ? trim($recipe['step_title_' . $i]) : '';
            $desc = isset($recipe['step_desc_' . $i]) ? trim($recipe['step_desc_' . $i]) : '';
            $img = isset($step_images[$i-1]) ? trim($step_images[$i-1]) : '';
            if ($title || $desc || $img) {
              echo '<button type="button" class="content-btn" data-target="step-' . $i . '">Step ' . $i . '</button>';
            }
          }
          ?>
        </div>
      </div>
    </main>
    
    <!-- Footer -->
    <?php include_once "includes/footer.php"; ?>
    
    <!-- Close Connection -->
    <?php
    include_once "includes/db-close.php"; 
    ?>
    
    <script src="scripts/main.js"></script>
  </body>
</html>
