<?php
//Display filter options
$filterOptions = [
  "Fish",
  "Beef",
  "Pork",
  "Poultry",
  "Vegetarian"
];
foreach ($filterOptions as $option) : ?>
  <label class="filter-option">
    <input type="checkbox" name="filter[]" value="<?php echo htmlspecialchars($option); ?>"
      <?php if (isset($_GET['filter']) && in_array($option, $_GET['filter'])) { echo 'checked'; } ?>>
    <span class="checkmark"></span>
    <span class="option-label"><?php echo htmlspecialchars($option); ?></span>
  </label>
<?php endforeach; ?>
