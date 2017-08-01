<?php

if (empty($_POST['pass']) && empty($_POST['name']) && empty($_POST['surname']) && empty($_POST['phone']) && empty($_FILES['images'])) {
    echo "Todos están vacios";
} else {
    (new Users())->edit();
}
