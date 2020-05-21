<?php

namespace TBoileau\ORM\DataMapping\Annotation;

/**
 * Class Relation
 * @package TBoileau\ORM\DataMapping\Annotation
 * @Annotation
 */
abstract class Relation
{
    public $targetEntity;

    /**
     * @return string
     */
    abstract public function getTargetProperty(): string;
}
