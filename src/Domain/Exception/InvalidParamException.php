<?php

declare(strict_types=1);

namespace OrionUa\DDDCore\Domain\Exception;

class InvalidParamException extends DomainException
{
    protected string $uuid;
}
