<?php
// Featured Recipes List 
$featured_ids = [12, 27, 29]; //showing these specific featured recipes

$placeholders = implode(',', array_fill(0, count($featured_ids), '?'));

// Prepare statement
$stmt = mysqli_prepare($connection, "SELECT id, title, subtitle, main_image, cook_time, servings FROM idm232_recipes WHERE id IN ($placeholders)");
if ($stmt) {
  $types = str_repeat('i', count($featured_ids));
  $bind_params = [];
  $bind_params[] = & $types;
  foreach ($featured_ids as $i => $rid) {
    $bind_params[] = & $featured_ids[$i];
  }
  call_user_func_array([$stmt, 'bind_param'], $bind_params);
  mysqli_stmt_execute($stmt);
  $res = mysqli_stmt_get_result($stmt);
}
?>

<?php if (!empty($res) && mysqli_num_rows($res) > 0): ?>
  <section class="featured-list">
    <div class="featured-cards-container">
      <?php while ($recipe = mysqli_fetch_assoc($res)) : ?>
        <?php include 'includes/recipe-card.php'; ?>
      <?php endwhile; ?>
    </div>
  </section>
<?php endif; ?>
