<?php
  $adminDir = __DIR__ . '/admin/config.php';
  if (file_exists($adminDir)) require_once $adminDir;
  if (!defined('DATA_DIR')) define('DATA_DIR', __DIR__ . '/data/');
  header('Content-Type: application/json; charset=utf-8');
  if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
      http_response_code(405);
      echo json_encode(['ok' => false, 'error' => 'Method not allowed']);
      exit;
  }
  $name  = trim($_POST['name']  ?? '');
  $city  = trim($_POST['city']  ?? '');
  $stars = intval($_POST['stars'] ?? 5);
  $text  = trim($_POST['text']  ?? '');
  if ($name === '' || $text === '') {
      http_response_code(422);
      echo json_encode(['ok' => false, 'error' => 'Заполните имя и текст отзыва']);
      exit;
  }
  if ($stars < 1 || $stars > 5) $stars = 5;
  $author = $city ? "$name, $city" : $name;
  $file    = DATA_DIR . 'reviews.json';
  $reviews = file_exists($file) ? (json_decode(file_get_contents($file), true) ?: []) : [];
  $reviews[] = ['id' => uniqid(), 'author' => $author, 'stars' => $stars, 'text' => $text, 'status' => 'pending', 'created_at' => date('Y-m-d H:i:s')];
  if (!is_dir(DATA_DIR)) mkdir(DATA_DIR, 0755, true);
  file_put_contents($file, json_encode($reviews, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
  echo json_encode(['ok' => true]);
