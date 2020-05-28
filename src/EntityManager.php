<?php

namespace TBoileau\ORM;

/**
 * Class EntityManager
 * @package TBoileau\ORM
 */
class EntityManager implements EntityManagerInterface
{
    /**
     * @var UnitOfWork
     */
    private UnitOfWork $unitOfWork;

    /**
     * EntityManager constructor.
     * @param UnitOfWork $unitOfWork
     */
    public function __construct(UnitOfWork $unitOfWork)
    {
        $this->unitOfWork = $unitOfWork;
    }

    /**
     * @param object $entity
     */
    public function persist(object $entity): void
    {
        $this->unitOfWork->addNewEntity($entity);
    }

    /**
     * @param object $entity
     * @throws \ReflectionException
     */
    public function remove(object $entity): void
    {
        $this->unitOfWork->addRemovedEntity($entity);
    }

    /**
     *
     */
    public function flush(): void
    {
        foreach ($this->unitOfWork->getNewEntityReferences() as $reference) {
            $reference->setState(UnitOfWork::STATE_MANAGED);
        }

        $this->unitOfWork->clearRemovedEntityReference();
    }
}
