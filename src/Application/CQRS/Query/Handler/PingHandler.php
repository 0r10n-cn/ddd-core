<?php

declare(strict_types=1);

namespace Application\CQRS\Query\Handler;

use OrionUa\DDDCore\Application\CQRS\HandlerInterface;
use OrionUa\DDDCore\Application\CQRS\Query\Ping;

class PingHandler implements HandlerInterface
{
    public function supports(): string
    {
        return Ping::class;
    }

    /**
     * @param Ping $ping
     *
     * @return string
     */
    public function __invoke(Ping $ping): string
    {
        return 'pong';
    }
}
