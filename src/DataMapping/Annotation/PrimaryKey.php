<?php

namespace TBoileau\ORM\DataMapping\Annotation;

/**
 * Class PrimaryKey
 * @package TBoileau\ORM\DataMapping\Annotation
 * @Annotation
 */
class PrimaryKey extends Property
{
    public $autoIncrement;
}
