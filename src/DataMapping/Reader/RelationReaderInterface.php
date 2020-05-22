<?php

namespace TBoileau\ORM\DataMapping\Reader;

use ReflectionProperty;
use TBoileau\ORM\DataMapping\Annotation\Relation;

/**
 * Interface RelationReaderInterface
 * @package TBoileau\ORM\DataMapping\Reader
 */
interface RelationReaderInterface
{
    /**
     * @param ReflectionProperty $property
     * @return Relation
     */
    public function read(ReflectionProperty $property): Relation;
}
