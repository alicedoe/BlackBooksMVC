<?php

//require_once '../autoloader.php';
require_once '../kernel.php';
require_once '../pdosingleton.php';
require_once '../config.php';

Database::getInstance();
Kernel::getInstance()->main();