<?php

namespace TBoileau\ORM\DataMapping\Annotation;

/**
 * Class Relation
 * @package TBoileau\ORM\DataMapping\Annotation
 * @Annotation
 */
abstract class Relation extends Property
{
    public $targetEntity;

    /**
     * @return string
     */
    abstract public function getTargetProperty(): string;

    /**
     * @return string
     */
    abstract public function getMetadataClass(): string;
}
