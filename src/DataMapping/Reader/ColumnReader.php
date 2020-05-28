<?php

namespace TBoileau\ORM\DataMapping\Reader;

use Doctrine\Common\Annotations\AnnotationReader;
use ReflectionProperty;
use TBoileau\ORM\DataMapping\Annotation\Column;

use function Symfony\Component\String\u;

/**
 * Class ColumnReader
 * @package TBoileau\ORM\DataMapping\Reader
 */
class ColumnReader
{
    /**
     * @param ReflectionProperty $property
     * @return Column|null
     */
    public static function read(ReflectionProperty $property): ?Column
    {
        $column = (new AnnotationReader())->getPropertyAnnotation($property, Column::class);

        if ($column === null) {
            return null;
        }

        if ($column->name === null) {
            $column->name = u($property->getName())->snake();
        }
        if ($column->unique === null) {
            $column->unique = false;
        }

        return $column;
    }
}
