<?php

namespace TBoileau\ORM\DataMapping\Reader;

use ReflectionProperty;
use TBoileau\ORM\DataMapping\Annotation\Column;

/**
 * Interface ColumnReaderInterface
 * @package TBoileau\ORM\DataMapping\Reader
 */
interface ColumnReaderInterface
{
    /**
     * @param ReflectionProperty $property
     * @return Column
     */
    public function read(ReflectionProperty $property): Column;
}
