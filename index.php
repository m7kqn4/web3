<?php
header('Content-Type: text/html; charset=UTF-8');

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  if (!empty($_GET['save'])) {
    echo '<!DOCTYPE html>
    <html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Успешно отправлено</title>
        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }
            body {
                font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
                background: linear-gradient(135deg, #e8ecf2 0%, #e0e4ea 100%);
                display: flex;
                justify-content: center;
                align-items: center;
                min-height: 100vh;
                margin: 0;
                padding: 20px;
            }
            .success-container {
                background: #ffffff;
                padding: 50px 40px;
                border-radius: 28px;
                width: 100%;
                max-width: 500px;
                text-align: center;
                position: relative;
                box-shadow: 0 25px 40px -12px rgba(0, 0, 0, 0.15);
            }
            .success-container::before {
                content: \'\';
                position: absolute;
                inset: -8px;
                background: radial-gradient(circle at 30% 20%, rgba(55, 169, 213, 0.87), rgba(68, 196, 239, 0.8), transparent 70%);
                border-radius: 32px;
                z-index: -2;
                filter: blur(20px);
            }
            .success-icon {
                font-size: 64px;
                margin-bottom: 20px;
            }
            .success-message {
                font-size: 24px;
                font-weight: 600;
                color: #48b3c8;
                margin-bottom: 15px;
            }
            .success-text {
                font-size: 16px;
                color: #4b5563;
                margin-bottom: 30px;
            }
            .back-button {
                display: inline-block;
                background: linear-gradient(135deg, #3b82f6, #06b6d4);
                color: white;
                text-decoration: none;
                padding: 12px 30px;
                border-radius: 40px;
                font-weight: 600;
                transition: all 0.3s ease;
            }
            .back-button:hover {
                background: linear-gradient(135deg, #2563eb, #0891b2);
                transform: translateY(-2px);
                box-shadow: 0 8px 25px rgba(59, 130, 246, 0.3);
            }
        </style>
    </head>
    <body>
        <div class="success-container">
            <div class="success-icon">✓</div>
            <div class="success-message">Спасибо!</div>
            <div class="success-text">Ваши результаты успешно сохранены</div>
            <a href="index.php" class="back-button">Вернуться к форме</a>
        </div>
    </body>
    </html>';
    exit();
  }
  
  include('form.php');
  exit();
}

$errors = FALSE;
if (empty($_POST['name']) || !preg_match('/^[a-zA-Zа-яА-Я\s]+$/u', $_POST['name'])) {
  print('Поле ФИО заполнено неверно.<br/>');
  $errors = TRUE;
}

if (empty($_POST['phone']) || !preg_match('/^[\d\+\-\(\)\s]{6,20}$/', $_POST['phone'])) {
  print('Ошибка в поле телефона. Используйте цифры и формат +7...<br/>');
  $errors = TRUE;
}

if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
  print('Поле Email заполнено неверно.<br/>');
  $errors = TRUE;
}

if (empty($_POST['birthday'])) {
  print('Укажите дату рождения.<br/>');
  $errors = TRUE;
}

if (empty($_POST['languages'])) {
  print('Выберите хотя бы один язык.<br/>');
  $errors = TRUE;
}

if (empty($_POST['contract'])) {
  print('Вы не подтвердили согласие.<br/>');
  $errors = TRUE;
}

if ($errors) {
  exit();
}

$user = 'u82641';
$pass = '******';
$db_name = 'u82641';

try {
  $db = new PDO("mysql:host=localhost;dbname=$db_name", $user, $pass, [
    PDO::ATTR_PERSISTENT => true,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
  ]);

  $stmt = $db->prepare("INSERT INTO application (name, phone, email, birthday, gender, bio) VALUES (?, ?, ?, ?, ?, ?)");
  $stmt->execute([
    $_POST['name'],
    $_POST['phone'],
    $_POST['email'],
    $_POST['birthday'],
    $_POST['gender'],
    $_POST['bio']
  ]);

  $app_id = $db->lastInsertId();

  $stmt_lang = $db->prepare("INSERT INTO application_languages (application_id, language_id) VALUES (?, ?)");
  foreach ($_POST['languages'] as $lang_id) {
    $stmt_lang->execute([$app_id, $lang_id]);
  }
} catch(PDOException $e) {
  print('Error : ' . $e->getMessage());
  exit();
}

header('Location: ?save=1');
