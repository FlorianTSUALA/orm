<?php

namespace TBoileau\ORM;

use TBoileau\ORM\DataMapping\Resolver\MetadataResolver;

/**
 * Class UnitOfWork
 * @package TBoileau\ORM
 */
final class UnitOfWork
{
    const STATE_NEW = "new";

    const STATE_MANAGED = "managed";

    const STATE_REMOVED = "removed";

    /**
     * @var Reference[]
     */
    private static array $references = [];

    /**
     * @var MetadataResolver
     */
    private MetadataResolver $metadataResolver;

    /**
     * UnitOfWork constructor.
     * @param MetadataResolver $metadataResolver
     */
    public function __construct(MetadataResolver $metadataResolver)
    {
        $this->metadataResolver = $metadataResolver;
    }

    /**
     * @param object $entity
     */
    public function addNewEntity(object $entity): void
    {
        $reference = new Reference($entity, null, self::STATE_NEW);
        static::$references[$reference->getObjectId()] = $reference;
    }

    /**
     * @param object $entity
     * @throws \ReflectionException
     */
    public function addManagedEntity(object $entity): void
    {
        $reference = static::$references[spl_object_id($entity)] ?? null;

        if ($reference === null) {
            $entityMetadata = $this->metadataResolver->getMetadata(get_class($entity));
            $primaryKey = $entityMetadata->getPrimaryKey()->getValue($entity);
            $reference = new Reference($entity, $primaryKey, self::STATE_MANAGED);
        }

        static::$references[$reference->getObjectId()] = $reference;
    }

    /**
     * @param object $entity
     * @throws \ReflectionException
     */
    public function addRemovedEntity(object $entity): void
    {
        static::$references[spl_object_id($entity)]->setState(self::STATE_REMOVED);
    }

    /**
     * @return Reference[]
     */
    public function getNewEntityReferences(): array
    {
        return array_filter(
            static::$references,
            fn (Reference $reference): bool => $reference->getState() === self::STATE_NEW
        );
    }

    /**
     * @return Reference[]
     */
    public function getManagedEntityReferences(): array
    {
        return array_filter(
            static::$references,
            fn (Reference $reference): bool => $reference->getState() === self::STATE_MANAGED
        );
    }

    /**
     * @return Reference[]
     */
    public function getRemovedEntityReferences(): array
    {
        return array_filter(
            static::$references,
            fn (Reference $reference): bool => $reference->getState() === self::STATE_REMOVED
        );
    }

    /**
     * Remove all 'removed references'
     */
    public function clearRemovedEntityReference(): void
    {
        static::$references = array_filter(
            static::$references,
            fn (Reference $reference): bool => $reference->getState() !== self::STATE_REMOVED
        );
    }
}
