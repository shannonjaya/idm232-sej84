<!-- Recipe card component -->
<a href="recipe-page.php?id=<?php echo $recipe['id']; ?>" class="recipe-card">
  <img
    class="recipe-image"
    src="<?php echo 'assets/recipe-images/' . $recipe['id'] . '/' . $recipe['main_image']; ?>"
    alt="<?php echo htmlspecialchars($recipe['title']); ?>"
  >
            <div class="recipe-text">
              <h2 class="recipe-title"><?php echo $recipe['title']; ?></h2>
              <p class="recipe-subtitle"><?php echo $recipe['subtitle']; ?></p>
              <div class="recipe-info">
               <span class="recipe-time">
               <img src="assets/clock.svg" class="time-icon" alt="Clock" width="28" height="28" >
            <?php echo $recipe['cook_time']; ?> min
          </span>
        <div class="divider"></div>
      <span class="recipe-servings"><?php echo $recipe['servings']; ?> servings</span>
    </div>
  </div>
</a>

          