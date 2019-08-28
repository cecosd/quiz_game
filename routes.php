<?php 

$router = new App\Routing\Router(new App\Routing\Request);

$router->get('/', function() {
    require_once "resources/views/header.php";
    require_once "resources/views/content.php";
    require_once "resources/views/footer.php";
});

$router->get('/get-questions', function() {
    $questions = (new App\Services\GameService())->binaryMode();
    return json_encode($questions);
});

$router->get('/get-questions-optional-mode', function() {
    $questions = (new App\Services\GameService())->optionalMode();
    return json_encode($questions);
});