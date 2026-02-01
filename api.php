<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(204);
    exit(0);
}

require_once "includes/db.php";

$method   = $_SERVER['REQUEST_METHOD'];
$request  = $_GET['request'] ?? '';
$idParam  = $_GET['id'] ?? null;
$id       = isset($idParam) ? (int)$idParam : null;

$endpoint = explode('/', trim((string)$request, '/'))[0] ?? '';
$table = "idm232_recipes";

if ($method === 'GET') {
  if ($endpoint === 'recipes' && !$id) {
    $sql = "SELECT * FROM $table";
    $result = $connection->query($sql);
    if (!$result) {
      http_response_code(500);
      echo json_encode(["error" => $connection->error]);
    } else {
      $recipes = [];
      while ($row = $result->fetch_assoc()) {
        $recipes[] = $row;
      }
      echo json_encode($recipes);
    }
  } elseif ($endpoint === 'recipes' && $id) {
    $stmt = $connection->prepare("SELECT * FROM $table WHERE id = ?");
    if ($stmt === false) {
      http_response_code(500);
      echo json_encode(["error" => $connection->error]);
    } else {
      $stmt->bind_param("i", $id);
      $stmt->execute();
      $result = $stmt->get_result();
      $recipe = $result ? $result->fetch_assoc() : null;
      $stmt->close();
      echo json_encode($recipe ?: null);
    }
  } else {
    http_response_code(404);
    echo json_encode(["error" => "Invalid GET endpoint"]);
  }
} else {
  http_response_code(405);
  echo json_encode(["error" => "Method not allowed"]);
}

$connection->close();
