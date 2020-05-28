<?php

namespace TBoileau\ORM\DataMapping\Annotation;

use TBoileau\ORM\DataMapping\Metadata\HasManyRelationMetadata;

/**
 * Class HasMany
 * @package TBoileau\ORM\DataMapping\Annotation
 * @Annotation
 */
class HasMany extends Owner
{
    /**
     * @return string
     */
    public function getMetadataClass(): string
    {
        return HasManyRelationMetadata::class;
    }
}
