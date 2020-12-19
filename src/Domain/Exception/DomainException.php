<?php

declare(strict_types=1);

namespace OrionUa\DDDCore\Domain\Exception;

use OrionUa\DDDCore\Exception\UuidAwareExceptionInterface;

class DomainException extends \DomainException implements UuidAwareExceptionInterface
{
    protected string $uuid = '25d48e63-9dbc-459d-8c29-b5d212d5c9b7';

    /**
     * @return string
     */
    public function getUuid(): string
    {
        return $this->uuid;
    }

}
