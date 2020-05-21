<?php

namespace TBoileau\ORM\DataMapping\Reader;

use ReflectionProperty;
use TBoileau\ORM\DataMapping\Annotation\Property;

/**
 * Interface ReaderInterface
 * @package TBoileau\ORM\DataMapping\Reader
 */
interface ReaderInterface
{
    /**
     * @param ReflectionProperty $property
     * @return Property
     */
    public static function read(ReflectionProperty $property): Property;
}
