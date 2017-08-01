<?php

if (Func::e($_POST['email'], $_POST['pass'], $_POST['name'], $_POST['surname'], $_POST['birthdate'], $_POST['phone'])) {
    echo "Todos los campos deben estar llenos";
} else {
    (new Users())->add();
}
