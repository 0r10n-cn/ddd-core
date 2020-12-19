<?php

declare(strict_types=1);

namespace OrionUa\DDDCore\Infrastructure\Repository;

use OrionUa\DDDCore\Infrastructure\Repository\Exception\EntityNotFoundException;
use OrionUa\DDDCore\Infrastructure\Repository\RepositoryInterface;
use OrionUa\DDDCore\Infrastructure\Repository\RepositoryWriteAwareInterface;
use OrionUa\DDDCore\Infrastructure\Repository\Schema\Table;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;
use OrionUa\DDDCore\Domain\Entity\EntityInterface;

abstract class AbstractProxyDoctrineRepository implements RepositoryInterface, RepositoryWriteAwareInterface
{
    protected ManagerRegistry $doctrine;
    /** @var EntityRepository */
    protected EntityRepository $doctrineRepository;
    /** @var Table */
    protected $table;

    /**
     * AbstractProxy constructor.
     *
     * @param ManagerRegistry $doctrine
     * @param Table $table
     */
    public function __construct(ManagerRegistry $doctrine)
    {
        $this->doctrineRepository = $doctrine->getRepository($this->getEntityClass());
        $this->table = new Table($this->getEntityClass(), $this->getTableAlias());
        $this->doctrine = $doctrine;
    }

    /**
     * @return string
     */
    abstract protected function getTableAlias(): string;

    /**
     * @return string
     */
    abstract protected function getEntityClass(): string;

    /**
     * @param string $fieldName
     *
     * @return string
     */
    public function createField(string $fieldName): string
    {
        return $this->table->createColumn($fieldName);
    }

    /**
     * @return \Doctrine\ORM\QueryBuilder
     */
    protected function createQueryBuilder(): QueryBuilder
    {
        return $this->doctrineRepository->createQueryBuilder($this->table->alias());
    }

    /**
     * @param EntityInterface $entity
     *
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function save(EntityInterface $entity): void
    {
        $this->doctrine->getManager()->persist($entity);
        $this->doctrine->getManager()->flush();
    }

    /**
     * @param EntityInterface $entity
     *
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function delete(EntityInterface $entity): void
    {
        $this->doctrine->getManager()->remove($entity);
        $this->doctrine->getManager()->flush();
    }

    /**
     * @param int|\Ramsey\Uuid\UuidInterface $id
     *
     * @return EntityInterface
     * @throws EntityNotFoundException
     */
    public function get($id): EntityInterface
    {
        $entity = $this->doctrineRepository->find($id);

        if (!$entity) {
            throw EntityNotFoundException::newById($this->doctrineRepository->getClassName(), $id);
        }

        return $entity;
    }
}
