<?php

declare(strict_types=1);

namespace OrionUa\DDDCore\Infrastructure\Event;

class EntityChangeEvent implements EventInterface
{
    private $id;
    private string $entityName;

    /**
     * EntityChangeEvent constructor.
     * @param $id
     * @param string $entityName
     */
    public function __construct($id, string $entityName)
    {
        $this->id = $id;
        $this->entityName = $entityName;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getEntityName(): string
    {
        return $this->entityName;
    }
}
