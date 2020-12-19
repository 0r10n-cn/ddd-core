<?php

declare(strict_types=1);

namespace OrionUa\DDDCore\Infrastructure\Exception;

class EntityNotFoundException extends InfrastructureException
{
    public const BY_ID_CODE = '0ebe7b5d-9bbe-4661-abd0-281235a31907';
    public const BY_CRITERIA_CODE = '0ebe7b5d-9bbe-4661-abd0-281235a31907';

    protected const NOT_FOUND_ID_MESSAGE = 'Entity %s not found id: %s';
    protected const BY_CRITERIA_MESSAGE = 'Entity %s not found by criteria: %s';

    /**
     * @param string $className
     * @param $id
     * @return static
     */
    public static function newById(string $className, $id): self
    {
        $exception =  new self(sprintf(self::NOT_FOUND_ID_MESSAGE, $className, $id), 0);
        $exception->uuid = static::BY_ID_CODE;

        return $exception;
    }

    /**
     * @param string $className
     * @param \Classes\Interpreter\Criteria\CriteriaInterface $criteria
     *
     * @return string
     */
    /*protected static function createCriteriaMessage(string $className, CriteriaInterface $criteria)
    {
        return sprintf(self::BY_CRITERIA_MESSAGE, $className, get_class($criteria));
    }*/
}
