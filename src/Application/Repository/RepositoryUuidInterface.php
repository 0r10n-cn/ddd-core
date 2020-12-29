<?php

declare(strict_types=1);

namespace OrionUa\DDDCore\Application\Repository;

use Ramsey\Uuid\UuidInterface;

interface RepositoryUuidInterface
{
    public function get(UuidInterface $id);
}