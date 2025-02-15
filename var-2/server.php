<!DOCTYPE html>
<html lang="ru">
<meta charset="UTF-8">
<title>Программирование на языке PHP</title>

<body>
    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $empty_errors = [];
        $invalid_errors = [];

        if (empty($_POST["login"])) {
            $empty_errors[] = "Не заполнено поле Логин";
        }

        // Проверяем поле E-mail
        if (empty($_POST["email"])) {
            $empty_errors[] = "Не заполнено поле E-mail";
        } else {
            $email = trim($_POST["email"]);
            if (!preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $email)) {
                $invalid_errors[] = "$email - невалидный адрес";
            }
        }

        if (empty($_POST["pwd"])) {
            $empty_errors[] = "Не заполнено поле Пароль";
        }

        if (!empty($empty_errors) || !empty($invalid_errors)) {
            echo "<h2>Безопасность данных</h2>";

            if (!empty($empty_errors)) {
                echo "<h3>Пустые значения</h3>";
                foreach ($empty_errors as $error) {
                    echo "<p>$error</p>";
                }
            }

            if (!empty($invalid_errors)) {
                echo "<h3>Невалидные значения</h3>";
                foreach ($invalid_errors as $error) {
                    echo "<p>$error</p>";
                }
            }
        } else {
            echo "<h2>Форма успешно отправлена!</h2>";
        }
    }

    ?>
</body>

</html>
