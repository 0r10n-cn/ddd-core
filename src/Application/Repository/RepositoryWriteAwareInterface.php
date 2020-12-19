<?php

declare(strict_types=1);

namespace OrionUa\DDDCore\Application\Repository;

use OrionUa\DDDCore\Domain\Entity\EntityInterface;

interface RepositoryWriteAwareInterface
{
    /**
     * @param EntityInterface $entity
     */
    public function save(EntityInterface $entity): void;

    /**
     * @param EntityInterface $entity
     */
    public function delete(EntityInterface $entity): void;
}
