<?php

namespace TBoileau\ORM\DataMapping\Resolver;

use TBoileau\ORM\DataMapping\Metadata\PrimaryKeyMetadata;
use TBoileau\ORM\DataMapping\Reader\ColumnReader;
use TBoileau\ORM\DataMapping\Reader\PrimaryKeyReader;

/**
 * Class PrimaryKeyResolver
 * @package TBoileau\ORM\DataMapping\Resolver
 */
class PrimaryKeyResolver implements PrimaryKeyResolverInterface
{
    /**
     * @param string $class
     * @param string $property
     * @return PrimaryKeyMetadata|null
     * @throws \ReflectionException
     */
    public function getMetadata(string $class, string $property): ?PrimaryKeyMetadata
    {
        $property = new \ReflectionProperty($class, $property);
        $primary = PrimaryKeyReader::read($property);

        if ($primary === null) {
            return null;
        }

        $column = ColumnReader::read($property);

        return new PrimaryKeyMetadata(
            $property,
            $column->name,
            $column->type,
            $column->length,
            $column->unique,
            $column->precision,
            $column->scale,
            $primary->autoIncrement
        );
    }
}
