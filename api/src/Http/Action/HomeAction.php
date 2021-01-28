<?php

declare(strict_types=1);

namespace App\Http\Action;

use PostSMS\Foundation\Http\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

/**
 * Class HomeAction
 * @package App\Http\Action
 */
class HomeAction implements RequestHandlerInterface
{
    /**
     * @inheritDoc
     */
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        return new JsonResponse([
            'hello' => ', world!'
        ]);
    }
}
