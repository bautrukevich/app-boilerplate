<?php

declare(strict_types=1);

use Doctrine\Migrations\Tools\Console\ConsoleRunner;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper;
use Psr\Container\ContainerInterface;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Command\Command;

require __DIR__ . '/../vendor/autoload.php';

if (getenv('SENTRY_DSN')) {
    Sentry\init(['dsn' => getenv('SENTRY_DSN')]);
}

/** @var ContainerInterface $container */
$container = require __DIR__ . '/../config/container.php';

$cli = new Application('Console');

if (getenv('SENTRY_DSN')) {
    $cli->setCatchExceptions(false);
}

/**
 * @var string[] $commands
 * @psalm-supress MixedArraySuccess
 */
$commands = $container->get('config')['console']['commands'];

/** @var EntityManagerInterface $entityManager */
$entityManager = $container->get(EntityManagerInterface::class);
$cli->getHelperSet()->set(new EntityManagerHelper($entityManager), 'em');

ConsoleRunner::addCommands($cli);
foreach ($commands as $name) {
    /** @var Command $command */
    $command = $container->get($name);
    $cli->add($command);
}

$cli->run();
