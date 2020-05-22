<?php

namespace TBoileau\ORM\DataMapping\Reader;

use Doctrine\Common\Annotations\AnnotationReader;
use ReflectionProperty;
use TBoileau\ORM\DataMapping\Annotation\PrimaryKey;

/**
 * Class PrimaryKeyReader
 * @package TBoileau\ORM\DataMapping\Reader
 */
class PrimaryKeyReader implements ReaderInterface
{
    /**
     * @param ReflectionProperty $property
     * @return PrimaryKey
     */
    public static function read(ReflectionProperty $property): PrimaryKey
    {
        return (new AnnotationReader())->getPropertyAnnotation($property, PrimaryKey::class);
    }
}
