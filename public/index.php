<?php

require_once __DIR__ . '/bootstrap.php';


$router->add('/', 'get', function () {
    echo "GET /";
    return true;
});

$router->add('/about', 'get', function () {
    echo "GET /about";
    return true;
});

$router->add('/', 'post', function ($request) {
    echo "POST";
    echo $request->name;
    echo $request->email;
    return true;
});

$router->run();
