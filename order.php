<?php
  require_once __DIR__ . '/admin/config.php';
  header('Content-Type: application/json; charset=utf-8');
  if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
      http_response_code(405);
      echo json_encode(['ok' => false, 'error' => 'Method not allowed']);
      exit;
  }
  $name = trim($_POST['name'] ?? '');
  $phone = trim($_POST['phone'] ?? '');
  $message = trim($_POST['message'] ?? '');
  if ($name === '' || $phone === '') {
      http_response_code(422);
      echo json_encode(['ok' => false, 'error' => 'Заполните имя и телефон']);
      exit;
  }
  $file = DATA_DIR . 'orders.json';
  $orders = file_exists($file) ? (json_decode(file_get_contents($file), true) ?: []) : [];
  $orders[] = ['id' => uniqid(), 'name' => $name, 'phone' => $phone, 'message' => $message, 'status' => 'new', 'created_at' => date('Y-m-d H:i:s')];
  if (!is_dir(DATA_DIR)) mkdir(DATA_DIR, 0755, true);
  file_put_contents($file, json_encode($orders, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
  $to = 'anna.kukharchuk.66@mail.ru';
  $subject = '=?UTF-8?B?' . base64_encode('Новая заявка — САКВОЯЖЪ') . '?=';
  $body  = "Новая заявка с сайта kozhaarxangelsk.ru\n\n";
  $body .= "Имя: {$name}\n";
  $body .= "Телефон: {$phone}\n";
  $body .= "Сообщение: {$message}\n\n";
  $body .= "Дата: " . date('d.m.Y H:i') . "\n";
  $headers  = "From: u3464720@kozhaarxangelsk.ru\r\n";
  $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
  mail($to, $subject, $body, $headers);
  echo json_encode(['ok' => true]);
