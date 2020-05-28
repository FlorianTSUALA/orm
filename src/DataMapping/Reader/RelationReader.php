<?php

namespace TBoileau\ORM\DataMapping\Reader;

use Doctrine\Common\Annotations\AnnotationReader;
use ReflectionProperty;
use TBoileau\ORM\DataMapping\Annotation\Owner;
use TBoileau\ORM\DataMapping\Annotation\Relation;

use function Symfony\Component\String\u;

/**
 * Class RelationResolver
 * @package TBoileau\ORM\DataMapping\Reader
 */
class RelationReader
{
    /**
     * @param ReflectionProperty $property
     * @return Relation|null
     */
    public static function read(ReflectionProperty $property): ?Relation
    {
        /** @var Relation $relation */
        $relation = (new AnnotationReader())->getPropertyAnnotation($property, Relation::class);

        if ($relation instanceof Owner && $relation->name === null) {
            $relation->name = u(
                sprintf(
                    "%s %s",
                    $property->getDeclaringClass()->getShortName(),
                    $property->getName()
                )
            )->snake();
        }

        return $relation;
    }
}
