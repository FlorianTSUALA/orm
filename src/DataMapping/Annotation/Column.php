<?php

namespace TBoileau\ORM\DataMapping\Annotation;

/**
 * Class Column
 * @package TBoileau\ORM\DataMapping\Annotation
 * @Annotation
 */
class Column extends Property
{
    public $name;

    public $type;

    public $length;

    public $unique;

    public $precision;

    public $scale;
}
