<?php

namespace TBoileau\ORM\DataMapping\Reader;

use ReflectionProperty;
use TBoileau\ORM\DataMapping\Annotation\PrimaryKey;

/**
 * Interface PrimaryKeyReaderInterface
 * @package TBoileau\ORM\DataMapping\Reader
 */
interface PrimaryKeyReaderInterface
{
    /**
     * @param ReflectionProperty $property
     * @return PrimaryKey|null
     */
    public function read(ReflectionProperty $property): ?PrimaryKey;
}
