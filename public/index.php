<?php
require_once '../controllers/MainController.php';

$mainController = new MainController();

switch ($_SERVER['REQUEST_URI']) {
    case '/':
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $mainController->main();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $mainController->save();
        }

        break;
    default:
        http_response_code(404);
        echo '<h1>Not found</h1>';
}
