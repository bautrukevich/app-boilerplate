<?php

declare(strict_types=1);

use PostSMS\Foundation\Http\Middleware\RoutingArgumentsMiddleware;
use Slim\App;
use Slim\Middleware\ErrorMiddleware;

return static function (App $app): void {
    $app->add(ErrorMiddleware::class);
    $app->add(RoutingArgumentsMiddleware::class);

    $app->addRoutingMiddleware();
};
