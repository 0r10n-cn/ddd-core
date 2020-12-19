<?php

declare(strict_types=1);

namespace OrionUa\DDDCore\Application\Repository;

use Doctrine\Common\Collections\Collection;

interface RepositoryGetAllAwareInterface
{
    public function getAll(): Collection;
}
