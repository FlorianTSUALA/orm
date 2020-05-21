<?php

namespace TBoileau\ORM\DataMapping\Annotation;

/**
 * Class Inverse
 * @package TBoileau\ORM\DataMapping\Annotation
 */
abstract class Inverse extends Relation
{
    public $mappedBy;

    /**
     * @return string
     */
    public function getTargetProperty(): string
    {
        return $this->mappedBy;
    }
}
