<?php 

require_once dirname(__FILE__).'/../controllers/LoginController.php';

$loginController = new LoginController();

$loginController->index($_REQUEST);