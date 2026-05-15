<?php
  require_once __DIR__ . '/admin/config.php';

  header('Content-Type: application/json; charset=utf-8');

  $type = $_GET['type'] ?? '';

  function readData($file) {
      if (!file_exists($file)) return [];
      $data = json_decode(file_get_contents($file), true);
      return is_array($data) ? $data : [];
  }

  if ($type === 'products') {
      echo json_encode(readData(DATA_DIR . 'products.json'), JSON_UNESCAPED_UNICODE);
  } elseif ($type === 'gallery') {
      echo json_encode(readData(DATA_DIR . 'gallery.json'), JSON_UNESCAPED_UNICODE);
  } else {
      echo '[]';
  }
