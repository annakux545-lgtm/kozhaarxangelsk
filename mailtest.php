<?php
$result = mail(
    'anna.kukharchuk.66@mail.ru',
    '=?UTF-8?B?' . base64_encode('Тест почты САКВОЯЖЪ') . '?=',
    'Это тестовое письмо с сайта kozhaarxangelsk.ru',
    "From: u3464720@kozhaarxangelsk.ru\r\nContent-Type: text/plain; charset=UTF-8\r\n"
);
echo json_encode(['sent' => $result, 'error' => error_get_last()]);
