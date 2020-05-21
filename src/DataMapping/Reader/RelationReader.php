<?php

namespace TBoileau\ORM\DataMapping\Reader;

use Doctrine\Common\Annotations\AnnotationReader;
use ReflectionProperty;
use TBoileau\ORM\DataMapping\Annotation\Relation;

/**
 * Class RelationResolver
 * @package TBoileau\ORM\DataMapping\Reader
 */
class RelationReader implements ReaderInterface
{
    /**
     * @param ReflectionProperty $property
     * @return Relation
     */
    public static function read(ReflectionProperty $property): Relation
    {
        return (new AnnotationReader())->getPropertyAnnotation($property, Relation::class);
    }
}
