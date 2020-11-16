<?php
require_once dirname(__DIR__).'/uikit/app.php';

session_unset();
session_destroy();

return header('Location: /Board/');