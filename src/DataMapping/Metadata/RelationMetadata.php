<?php

namespace TBoileau\ORM\DataMapping\Metadata;

use ReflectionProperty;

/**
 * Class RelationMetadata
 * @package TBoileau\ORM\DataMapping\Metadata
 */
abstract class RelationMetadata extends PropertyMetadata
{
    /**
     * @var EntityMetadata
     */
    protected EntityMetadata $targetEntityMetadata;

    /**
     * RelationMetadata constructor.
     * @param ReflectionProperty $property
     * @param EntityMetadata $targetEntityMetadata
     */
    public function __construct(ReflectionProperty $property, EntityMetadata $targetEntityMetadata)
    {
        parent::__construct($property);
        $this->targetEntityMetadata = $targetEntityMetadata;
    }

    /**
     * @return EntityMetadata
     */
    public function getTargetEntityMetadata(): EntityMetadata
    {
        return $this->targetEntityMetadata;
    }

    /**
     * @param EntityMetadata $targetEntityMetadata
     */
    public function setTargetEntityMetadata(EntityMetadata $targetEntityMetadata): void
    {
        $this->targetEntityMetadata = $targetEntityMetadata;
    }
}
