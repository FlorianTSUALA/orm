<?php

namespace TBoileau\ORM\DataMapping\Resolver;

use TBoileau\ORM\DataMapping\Metadata\ColumnMetadata;
use TBoileau\ORM\DataMapping\Reader\ColumnReader;

/**
 * Class ColumnResolver
 * @package TBoileau\ORM\DataMapping\Resolver
 */
class ColumnResolver implements ColumnResolverInterface
{
    /**
     * @param string $class
     * @param string $property
     * @return ColumnMetadata|null
     * @throws \ReflectionException
     */
    public function getMetadata(string $class, string $property): ?ColumnMetadata
    {
        $property = new \ReflectionProperty($class, $property);
        $column = ColumnReader::read($property);

        if ($column === null) {
            return null;
        }

        return new ColumnMetadata(
            $property,
            $column->name,
            $column->type,
            $column->length,
            $column->unique,
            $column->precision,
            $column->scale
        );
    }
}
