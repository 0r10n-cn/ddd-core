<?php

declare(strict_types=1);

namespace OrionUa\DDDCore\Domain\Event;

interface EventAwareInterface
{
    public function releaseEvents(): array;
}
