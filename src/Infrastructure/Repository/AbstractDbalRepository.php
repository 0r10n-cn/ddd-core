<?php

declare(strict_types=1);

namespace OrionUa\DDDCore\Infrastructure\Repository;

use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Exception;
use Doctrine\DBAL\ParameterType;
use Doctrine\DBAL\Query\QueryBuilder;
use OrionUa\DDDCore\Application\DTO\DTOInterface;
use OrionUa\DDDCore\Infrastructure\Mapper\MapperInterface;
use OrionUa\DDDCore\Infrastructure\Exception\EntityNotFoundException;
use OrionUa\DDDCore\Infrastructure\Exception\QueryExecutionException;
use OrionUa\DDDCore\Application\Repository\RepositoryInterface;
use OrionUa\DDDCore\Infrastructure\Repository\Schema\Table;

class AbstractDbalRepository implements RepositoryInterface
{
    protected Connection $connection;
    protected Table $table;
    private MapperInterface $mapper;

    /**
     * AbstractDbalRepository constructor.
     * @param Connection $connection
     * @param Table $table
     * @param callable|MapperInterface $mapper
     */
    public function __construct(Connection $connection, Table $table, callable $mapper)
    {
        $this->connection = $connection;
        $this->table = $table;
        $this->mapper = $mapper;
    }

    /**
     * @param int $id
     * @return DTOInterface
     * @throws EntityNotFoundException
     */
    public function get(int $id): DTOInterface
    {
        $queryBuilder = $this->getQueryBuilder();
        $idParam = $queryBuilder->createNamedParameter(
            $id,
            ParameterType::INTEGER,
            'id'
        );
        try {
            $row = $queryBuilder
                ->select('*')
                ->from($this->table->tableName(), $this->table->alias())
                ->where($this->table->createColumn('id') .' = '. $idParam)
                ->execute()
                ->fetchOne();
        } catch (Exception $exception) {
            throw new QueryExecutionException(
                sprintf('Failed to get %s with id %d', $this->table->tableName(), $id),
                QueryExecutionException::CODE,
                $exception
            );
        }
        if (!$row){
            throw new EntityNotFoundException(sprintf('Entity from table %s with id %d, not found', $this->table->tableName(), $id));
        }

        return call_user_func($this->getMapper(), $row);
    }

    /**
     * @return QueryBuilder
     */
    protected function getQueryBuilder(): QueryBuilder
    {
        return $this->connection->createQueryBuilder();
    }

    /**
     * @return Table
     */
    protected function getTable(): Table
    {
        return $this->table;
    }

    /**
     * @return MapperInterface
     */
    protected function getMapper(): callable
    {
        return $this->mapper;
    }
}
