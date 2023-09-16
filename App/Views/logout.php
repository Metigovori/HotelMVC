<?php

use Core\Session as CoreSession;

require_once("autoloader.php");
$session = new CoreSession();
$session->logout();
header("location:index.php");
