<?php

declare(strict_types=1);

namespace OrionUa\DDDCore;

interface SerializationAwareInterface extends \JsonSerializable
{
    public static function newFromArray(array $data);
}
