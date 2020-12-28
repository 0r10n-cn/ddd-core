<?php

declare(strict_types=1);

namespace OrionUa\DDDCore\Infrastructure\Event;

interface ExpirationAwareEventInterface
{
    public function getExpiration(): \DateTimeInterface;
}
