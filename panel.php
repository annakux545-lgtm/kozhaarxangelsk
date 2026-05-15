<?php
  session_start();
  define('ADMIN_PASSWORD', 'YOUR_PASSWORD_HERE');
  define('DATA_DIR',   __DIR__ . '/data/');
  define('UPLOAD_DIR', __DIR__ . '/uploads/');
  define('UPLOAD_URL', '/uploads/');

  if (isset($_GET['logout'])) { session_destroy(); header('Location: /panel.php'); exit; }
  if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['password'])) {
      if (hash_equals(ADMIN_PASSWORD, $_POST['password'])) { $_SESSION['admin'] = true; header('Location: /panel.php'); exit; }
      else { $loginError = 'Неверный пароль'; }
  }
  $isLoggedIn = !empty($_SESSION['admin']);
  // ... (full panel logic in admin/index.php)
  function h($s) { return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }
  ?>
  <!DOCTYPE html>
  <html lang="ru">
  <head><meta charset="UTF-8"><title>Панель — САКВОЯЖЪ</title></head>
  <body>
  <?php if (!$isLoggedIn): ?>
  <p>Основная панель управления находится в <a href="/admin/">/admin/</a></p>
  <?php endif; ?>
  </body></html>
