<?php

declare(strict_types=1);

use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Slim\Psr7\Factory\ResponseFactory;
use Slim\Psr7\Factory\StreamFactory;
use Slim\Psr7\Response;

return [
    ResponseFactoryInterface::class => static function (): ResponseFactoryInterface {
        return new ResponseFactory();
    },
    ResponseInterface::class => static function (): callable {
        return function () : Response {
            return new Response();
        };
    },
    StreamFactoryInterface::class => static function (): StreamFactoryInterface {
        return new StreamFactory();
    },
];
