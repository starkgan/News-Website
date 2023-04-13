<?php

include_once('config.php');

session_destroy();

echo 'You have been logged out. <a href="/">Go back</a>';

header('Location: sign-in.php');

?>