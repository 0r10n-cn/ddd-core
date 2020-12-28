<?php

declare(strict_types=1);

namespace OrionUa\DDDCore\Contracts;

interface ArrayAwareInterface
{
    public static function newFromArray(array $data): self;

    public function toArray(): array;
}
