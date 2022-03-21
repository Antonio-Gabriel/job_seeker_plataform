<?php

use Slim\App;
use Swu\Settings\Views;

return function (App $app) {

    $app->get('/client', function ($req, $res) {
        $views = new Views();
        $views->render("index.twig.html", [
            "name" => "Marcia Gaieta"
        ]);
    });
};
