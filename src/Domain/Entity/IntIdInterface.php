<?php

declare(strict_types=1);

namespace OrionUa\DDDCore\Domain\Entity;

interface IntIdInterface extends EntityInterface
{
    public function getId(): int;
}
