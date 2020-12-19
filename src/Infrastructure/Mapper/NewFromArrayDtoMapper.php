<?php

declare(strict_types=1);

namespace OrionUa\DDDCore\Infrastructure\Mapper;

use OrionUa\DDDCore\Application\DTO\DTOInterface;

class NewFromArrayDtoMapper implements MapperInterface
{
    private string $className;

    /**
     * NewFromArrayDtoMapper constructor.
     * @param string $className
     */
    public function __construct(string $className)
    {
        $this->className = $className;
    }


    /**
     * @param array $data
     *
     * @return DTOInterface
     */
    public function __invoke($data)
    {
        return call_user_func([$this->className, 'fromArray'], $data);
    }

}
