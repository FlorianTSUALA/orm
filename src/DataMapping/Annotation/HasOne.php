<?php

namespace TBoileau\ORM\DataMapping\Annotation;

use TBoileau\ORM\DataMapping\Metadata\HasOneRelationMetadata;

/**
 * Class HasOne
 * @package TBoileau\ORM\DataMapping\Annotation
 * @Annotation
 */
class HasOne extends Owner
{
    /**
     * @return string
     */
    public function getMetadataClass(): string
    {
        return HasOneRelationMetadata::class;
    }
}
