<?php

namespace TBoileau\ORM\DataMapping\Metadata;

use ReflectionProperty;

/**
 * Class PropertyMetadata
 * @package TBoileau\ORM\DataMapping\Metadata
 */
abstract class PropertyMetadata
{
    /**
     * @var ReflectionProperty
     */
    protected ReflectionProperty $column;

    /**
     * PropertyMetadata constructor.
     * @param ReflectionProperty $property
     */
    public function __construct(ReflectionProperty $property)
    {
        $this->property = $property;
    }

    /**
     * @return ReflectionProperty
     */
    public function getProperty(): ReflectionProperty
    {
        return $this->property;
    }

    /**
     * @param ReflectionProperty $property
     */
    public function setProperty(ReflectionProperty $property): void
    {
        $this->property = $property;
    }
}
