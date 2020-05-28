<?php

namespace TBoileau\ORM\DataMapping\Resolver;

use TBoileau\ORM\DataMapping\Metadata\PrimaryKeyMetadata;

/**
 * Interface RelationResolverInterface
 * @package TBoileau\ORM\DataMapping\Resolver
 */
interface PrimaryKeyResolverInterface
{
    /**
     * @param string $class
     * @param string $property
     * @return PrimaryKeyMetadata|null
     */
    public function getMetadata(string $class, string $property): ?PrimaryKeyMetadata;
}
