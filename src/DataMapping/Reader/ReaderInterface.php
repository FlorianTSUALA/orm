<?php

namespace TBoileau\ORM\DataMapping\Reader;

use ReflectionProperty;
use TBoileau\ORM\DataMapping\Annotation\Relation;

/**
 * Interface ReaderInterface
 * @package TBoileau\ORM\DataMapping\Reader
 */
interface ReaderInterface
{
    /**
     * @param ReflectionProperty $property
     * @return Relation
     */
    public static function read(ReflectionProperty $property): Relation;
}
