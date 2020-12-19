<?php

declare(strict_types=1);

namespace OrionUa\DDDCore\Infrastructure\Event;

abstract class AbstractEntitySyncEvent implements \JsonSerializable, EventInterface
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
    final public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    final public function getEntityName(): string
    {
        return $this->entityName;
    }

    /**
     * @return array
     */
    final public function jsonSerialize()
    {
        return [
            'event' => $this->getEventName(),
            'entityName' => $this->entityName,
            'id' => $this->id,
        ];
    }

    /**
     * @param array $array
     * @return mixed
     */
    public static function newFromArray(array $array)
    {
        $eventClass = $array['event'];

        return new $eventClass($array['id'], $array['entityName']);
    }

    /**
     * @return string
     */
    final public function getEventName(): string
    {
        return static::class;
    }
}
