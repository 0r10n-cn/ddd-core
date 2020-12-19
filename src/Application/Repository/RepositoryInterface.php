<?php

declare(strict_types=1);

namespace OrionUa\DDDCore\Application\Repository;

interface RepositoryInterface
{
    public function get(int $id);
}