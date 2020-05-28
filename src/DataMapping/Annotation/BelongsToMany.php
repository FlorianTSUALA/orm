<?php

namespace TBoileau\ORM\DataMapping\Annotation;

use TBoileau\ORM\DataMapping\Metadata\BelongsToManyRelationMetadata;

/**
 * Class BelongsToMany
 * @package TBoileau\ORM\DataMapping\Annotation
 * @Annotation
 */
class BelongsToMany extends Inverse
{
    /**
     * @return string
     */
    public function getMetadataClass(): string
    {
        return BelongsToManyRelationMetadata::class;
    }
}
