<?php

declare(strict_types=1);

namespace OrionUa\DDDCore\Application\CQRS;

interface HandlerInterface
{
    public function supports(): string;
}
