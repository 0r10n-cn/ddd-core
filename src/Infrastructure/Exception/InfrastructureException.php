<?php

declare(strict_types=1);

namespace OrionUa\DDDCore\Infrastructure\Exception;

use OrionUa\DDDCore\Exception\UuidAwareExceptionInterface;

class InfrastructureException extends \Exception implements UuidAwareExceptionInterface
{
    protected string $uuid;

    /**
     * @return string
     */
    public function getUuid(): string
    {
        return $this->uuid;
    }
}
