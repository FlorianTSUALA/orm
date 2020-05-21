<?php

namespace TBoileau\ORM\DataMapping\Annotation;

/**
 * Class Owner
 * @package TBoileau\ORM\DataMapping\Annotation
 */
abstract class Owner extends Relation
{
    public $inversedBy;

    /**
     * @return string
     */
    public function getTargetProperty(): string
    {
        return $this->inversedBy;
    }
}
