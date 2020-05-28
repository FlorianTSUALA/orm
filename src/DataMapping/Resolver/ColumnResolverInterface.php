<?php

namespace TBoileau\ORM\DataMapping\Resolver;

use TBoileau\ORM\DataMapping\Metadata\ColumnMetadata;

/**
 * Interface RelationResolverInterface
 * @package TBoileau\ORM\DataMapping\Resolver
 */
interface ColumnResolverInterface
{
    /**
     * @param string $class
     * @param string $property
     * @return ColumnMetadata|null
     */
    public function getMetadata(string $class, string $property): ?ColumnMetadata;
}
