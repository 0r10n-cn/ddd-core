<?php

declare(strict_types=1);

namespace OrionUa\DDDCore\Infrastructure\Repository;

interface RepositoryInterface
{
    public function get(int $id);
}