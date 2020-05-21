<?php

namespace TBoileau\ORM\DataMapping\Reader;

use Doctrine\Common\Annotations\AnnotationReader;
use ReflectionProperty;
use TBoileau\ORM\DataMapping\Annotation\Column;

/**
 * Class ColumnReader
 * @package TBoileau\ORM\DataMapping\Reader
 */
class ColumnReader implements ReaderInterface
{
    /**
     * @param ReflectionProperty $property
     * @return Column
     */
    public static function read(ReflectionProperty $property): Column
    {
        $column = (new AnnotationReader())->getPropertyAnnotation($property, Column::class);

        if ($column->name === null) {
            $column->name = $property->getName();
        }

        return $column;
    }
}
