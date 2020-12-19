<?php

declare(strict_types=1);

namespace OrionUa\DDDCore\Infrastructure\Repository\Schema;
/**
 * Class Table
 * @package Abstraction\Infrastructure\Repository\Schema
 */
class Table
{
    /** @var string */
    protected $tableName;
    /** @var string|null */
    protected $alias;

    /**
     * Table constructor.
     *
     * @param $tableName
     * @param $alias
     */
    public function __construct(string $tableName, string $alias = null)
    {
        $this->tableName = $tableName;
        $this->alias = $alias;
    }

    /**
     * @return string
     */
    final public function tableName(): string
    {
        return $this->tableName;
    }

    /**
     * @return string|null
     */
    final public function alias(): string
    {
        return $this->alias;
    }

    /**
     * @param string $column
     *
     * @return string
     */
    public function createColumn(string $column): string
    {
        return $this->alias ? "{$this->alias}.{$column}" : $column;
    }

    /**
     * @return string
     */
    public function createFrom(): string
    {
        return $this->alias ? "{$this->tableName} as {$this->alias}" : $this->tableName;
    }
}
