<?php

namespace TBoileau\ORM\DataMapping\Resolver;

use TBoileau\ORM\DataMapping\Metadata\EntityMetadata;

/**
 * Interface MetadataResolver
 * @package TBoileau\ORM\DataMapping\Resolver
 */
interface MetadataResolverInterface
{
    /**
     * @param string $class
     * @return EntityMetadata|null
     */
    public function getMetadata(string $class): ?EntityMetadata;
}
