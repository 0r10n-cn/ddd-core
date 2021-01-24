<?php

declare(strict_types=1);

namespace OrionUa\DDDCore\Application\CQRS\Query;

use OrionUa\DDDCore\Application\CQRS\QueryInterface;
use OrionUa\DDDCore\SerializationAwareInterface;

class Ping implements QueryInterface, SerializationAwareInterface
{
    public static function newFromArray(array $data)
    {
        return new self();
    }

    public function jsonSerialize()
    {
        return [];
    }
}
