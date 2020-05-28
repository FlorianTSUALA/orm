<?php

namespace TBoileau\ORM;

/**
 * Interface EntityManagerInterface
 * @package TBoileau\ORM
 */
interface EntityManagerInterface
{
    /**
     * @param object $entity
     */
    public function persist(object $entity): void;

    /**
     * @param object $entity
     */
    public function remove(object $entity): void;

    /**
     * FLush new entities, removed entites and managed entities
     */
    public function flush(): void;
}
