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
class ColumnReader implements ColumnReaderInterface
{
    /**
     * @param ReflectionProperty $property
     * @return Column
     */
    public function read(ReflectionProperty $property): Column
    {
        $column = (new AnnotationReader())->getPropertyAnnotation($property, Column::class);

        if ($column->name === null) {
            $column->name = u($property->getName())->snake();
        }

        return $column;
    }
}
