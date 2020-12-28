<?php

declare(strict_types=1);

namespace OrionUa\DDDCore\Contracts;

interface ArrayAwareInterface
{
    public static function fromArray(array $data): self;

    public function toArray(): array;
}
