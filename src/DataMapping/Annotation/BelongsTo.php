<?php

namespace TBoileau\ORM\DataMapping\Annotation;

use TBoileau\ORM\DataMapping\Metadata\BelongsToRelationMetadata;

/**
 * Class BelongsTo
 * @package TBoileau\ORM\DataMapping\Annotation
 * @Annotation
 */
class BelongsTo extends Inverse
{
    /**
     * @return string
     */
    public function getMetadataClass(): string
    {
        return BelongsToRelationMetadata::class;
    }
}
