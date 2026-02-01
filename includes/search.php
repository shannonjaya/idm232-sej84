<?php
// Search + filter logic
function sanitizeInput($data) {
  $data = is_string($data) ? $data : '';
  $data = trim($data);
  $data = stripslashes($data);
  $data = str_replace(["’", "ʼ", "“", "”"], ["'", "'", '"', '"'], $data);
  $data = str_replace("⁄", "/", $data);
  return $data;
}

function performSearch($connection) {
  $search_query = isset($_GET['search']) ? sanitizeInput($_GET['search']) : '';
  $filters = isset($_GET['filter']) ? $_GET['filter'] : [];

  $sql = "SELECT id, title, subtitle, main_image, cook_time, servings, protein FROM idm232_sej84 WHERE 1";
  $params = [];
  $types = '';

// Search
  if ($search_query !== '') {
    $fields = ['title','subtitle','all_ingredients']; 
    $likes = [];
    foreach ($fields as $field) {
      $likes[] = "$field LIKE ?";
      $params[] = "%" . $search_query . "%";
      $types .= 's';
    }
    $sql .= " AND (" . implode(' OR ', $likes) . ")";
  }

// Filters
  if (!empty($filters)) {
    $placeholders = implode(',', array_fill(0, count($filters), '?'));
    $sql .= " AND protein IN (" . $placeholders . ")";
    foreach ($filters as $f) {
      $params[] = $f;
      $types .= 's';
    }
  }

  // Prepare statement
  $stmt = mysqli_prepare($connection, $sql);
  if ($stmt === false) {
    return false;
  }

  if (!empty($params)) {
    $bindParams = [];
    $bindParams[] = $types;
    foreach ($params as $key => $value) {
      $bindParams[] = &$params[$key];
    }
    call_user_func_array([$stmt, 'bind_param'], $bindParams);
  }

  if (!mysqli_stmt_execute($stmt)) {
    mysqli_stmt_close($stmt);
    return false;
  }

  $result = mysqli_stmt_get_result($stmt);
  mysqli_stmt_close($stmt);
  return $result;
}
