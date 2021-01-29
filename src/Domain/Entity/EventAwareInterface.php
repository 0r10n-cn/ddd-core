<?php

declare(strict_types=1);

namespace OrionUa\DDDCore\Domain\Entity;

interface EventAwareInterface
{
    public function releaseEvents(): array;
}
