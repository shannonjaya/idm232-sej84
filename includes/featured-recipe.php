<?php
// Featured/Most Popular Recipe
$featured = null;
$featuredRes = mysqli_query($connection, "SELECT id, title, subtitle, main_image FROM idm232_recipes WHERE id=7 LIMIT 1");
if ($featuredRes) {
  $featured = mysqli_fetch_assoc($featuredRes);
  mysqli_free_result($featuredRes);
}
?>

<div class="featured-recipe">
  <?php if ($featured) : ?>
    <a href="recipe-page.php?id=<?php echo $featured['id']; ?>" class="featured-bg" style="background-image: url('<?php echo 'assets/recipe-images/' . $featured['id'] . '/' . $featured['main_image']; ?>');">
      <div class="featured-text">
        <h3 class="featured-heading">Most Popular</h3>
        <h1 class="featured-title"><?php echo htmlspecialchars($featured['title']); ?></h1>
        <?php if (!empty($featured['subtitle'])) : ?>
          <p class="featured-subtitle"><?php echo htmlspecialchars($featured['subtitle']); ?></p>
        <?php endif; ?>
      </div>
    </a>
  <?php endif; ?>
</div>
