<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Получить поля формы и удалить пробелы
    $name = strip_tags(trim($_POST["user-name"]));
    $name = str_replace(array("\r","\n"),array(" "," "),$name);
    $tel = trim($_POST["user-tel"]);
    $email = filter_var(trim($_POST["user-email"]), FILTER_SANITIZE_EMAIL);
    $comment = trim($_POST["user-comment"]);

    // Проверьте, что данные были отправлены на почту
    if (empty($name) || empty($message) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Установить код ответа 400 (плохой запрос) и выход
        http_response_code(400);
        echo "Будь ласка, заповніть форму та спробуйте ще раз.";
        exit;
    }

    // Установить адрес электронной почты получателя
                                         // заменить почту!!!!!
    $recipient = "altika.as@gmail.com";  

    //Установите тему электронной почты
    $subject = "Новий контакт від $name";

    // Создание контента электронной почты
    $email_content = "Name: $name\n";
    $email_content .= "Tel: $tel\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Comment:\n$comment\n";

    // Створення заголовків електронних листів
    $email_headers = "Від: $name <$email>";

    // Відправити електронне письмо
    if (mail($recipient, $subject, $email_content, $email_headers)) {
        // Встановіть код відповіді 200 (добре)
        http_response_code(200);
        echo "Дякую! Ваше повідомлення було відправлено.";
    } else {
        // Встановіть код відповіді 500 (внутрішня помилка сервера)
        http_response_code(500);
        echo "Ой! Щось пішло не так, і ми не змогли надіслати ваше повідомлення.";
    }

} else {
   // Це не запит POST, установіть код відповіді 403 (заборонено).
    http_response_code(403);
    echo "Виникла проблема з вашим поданням, спробуйте ще раз.";
}