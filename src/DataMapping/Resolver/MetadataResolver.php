<?php

namespace TBoileau\ORM\DataMapping\Resolver;

use TBoileau\ORM\DataMapping\Annotation\BelongsTo;
use TBoileau\ORM\DataMapping\Annotation\HasMany;
use TBoileau\ORM\DataMapping\Annotation\HasOne;
use TBoileau\ORM\DataMapping\Metadata\BelongsToManyRelationMetadata;
use TBoileau\ORM\DataMapping\Metadata\BelongsToRelationMetadata;
use TBoileau\ORM\DataMapping\Metadata\EntityMetadata;
use TBoileau\ORM\DataMapping\Metadata\HasManyRelationMetadata;
use TBoileau\ORM\DataMapping\Metadata\HasOneRelationMetadata;
use TBoileau\ORM\DataMapping\Reader\EntityReader;
use TBoileau\ORM\DataMapping\Reader\RelationReader;

/**
 * Class MetadataResolver
 * @package TBoileau\ORM\DataMapping\Resolver
 */
class MetadataResolver implements MetadataResolverInterface
{
    /**
     * @var ColumnResolverInterface
     */
    private ColumnResolverInterface $columnResolver;

    /**
     * @var PrimaryKeyResolverInterface
     */
    private PrimaryKeyResolverInterface $primaryKeyResolver;

    /**
     * @var EntityMetadata[]
     */
    private static array $entitiesMetadata = [];

    /**
     * PropertyResolver constructor.
     * @param ColumnResolverInterface $columnResolver
     * @param PrimaryKeyResolverInterface $primaryKeyResolver
     */
    public function __construct(
        ColumnResolverInterface $columnResolver,
        PrimaryKeyResolverInterface $primaryKeyResolver
    ) {
        $this->columnResolver = $columnResolver;
        $this->primaryKeyResolver = $primaryKeyResolver;
    }

    /**
     * @param string $class
     * @return EntityMetadata
     * @throws \ReflectionException
     */
    public function getMetadata(string $class): EntityMetadata
    {
        if (!isset(self::$entitiesMetadata[$class])) {
            $reflectionClass = new \ReflectionClass($class);
            $entity = EntityReader::read($reflectionClass);
            self::$entitiesMetadata[$class] = new EntityMetadata($entity->name, $entity->repositoryClass);

            foreach ($reflectionClass->getProperties() as $property) {
                if ($propertyMetadata = $this->primaryKeyResolver->getMetadata($class, $property->getName())) {
                    self::$entitiesMetadata[$class]->setPrimaryKey($propertyMetadata);
                    continue;
                }

                if ($propertyMetadata = $this->columnResolver->getMetadata($class, $property->getName())) {
                    self::$entitiesMetadata[$class]->addColumn($propertyMetadata);
                    continue;
                }

                $relation = RelationReader::read($property);

                if ($relation === null) {
                    continue;
                }

                $targetEntityMetadata = $this->getMetadata($relation->targetEntity);

                $relationClassMetadata = $relation->getMetadataClass();

                self::$entitiesMetadata[$class]->addRelation(
                    new $relationClassMetadata($property, $targetEntityMetadata)
                );
            }
        }

        return self::$entitiesMetadata[$class];
    }
}
