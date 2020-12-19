<?php

declare(strict_types=1);

namespace OrionUa\DDDCore\Infrastructure\Mapper;

interface MapperInterface
{
    public function __invoke($data);
}
