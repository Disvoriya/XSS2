<!DOCTYPE html>
<html lang="ru">
<meta charset="UTF-8">
<title>Программирование на языке PHP</title>

<body>
    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $errors = [];

        if (empty($_POST["login"])) {
            $errors[] = "Не заполнено поле Логин";
        }

        if (empty($_POST["email"])) {
            $errors[] = "Не заполнено поле E-mail";
        } else {
            $email = trim($_POST["email"]);

            if (!preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $email)) {
                $errors[] = "$email - Невалидный адрес";
            }
        }
        

        if (empty($_POST["password"])) {
            $errors[] = "Не заполнено поле Пароль";
        }

        if (!empty($errors)) {
            echo "<h2>Безопасность данных</h2><pre>";
            print_r($errors);
            echo "</pre>";
        } else {
            echo "<h2>Форма успешно отправлена!</h2>";
        }
    }

    ?>
</body>

</html>
