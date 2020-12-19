<?php

declare(strict_types=1);

namespace OrionUa\DDDCore\Exception;

interface UuidAwareExceptionInterface
{
    public function getUuid(): string;
}
