<?php

namespace TBoileau\ORM\DataMapping\Annotation;

/**
 * Class Entity
 * @package TBoileau\ORM\DataMapping\Annotation
 * @Annotation
 */
class Entity extends Annotation
{
    public $name;

    public $repositoryClass;
}
