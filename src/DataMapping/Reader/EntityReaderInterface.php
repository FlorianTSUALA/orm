<?php

namespace TBoileau\ORM\DataMapping\Reader;

use ReflectionClass;
use TBoileau\ORM\DataMapping\Annotation\Entity;

/**
 * Interface EntityReaderInterface
 * @package TBoileau\ORM\DataMapping\Reader
 */
interface EntityReaderInterface
{
    /**
     * @param ReflectionClass $class
     * @return Entity
     */
    public function read(ReflectionClass $class): Entity;
}
