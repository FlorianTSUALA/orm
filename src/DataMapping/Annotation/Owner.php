<?php

namespace TBoileau\ORM\DataMapping\Annotation;

/**
 * Class Owner
 * @package TBoileau\ORM\DataMapping\Annotation
 * @Annotation
 */
abstract class Owner extends Relation
{
    public $inversedBy;

    public $name;

    /**
     * @return string
     */
    public function getTargetProperty(): string
    {
        return $this->inversedBy;
    }
}
