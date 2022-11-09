<?php
if ($_POST) {
    $user = $_POST['user'];

    echo "Hello ".$user;
}
else {
    echo"Something went wrong";
}

?>