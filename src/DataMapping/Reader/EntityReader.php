<?php

namespace TBoileau\ORM\DataMapping\Reader;

use Doctrine\Common\Annotations\AnnotationReader;
use ReflectionClass;
use TBoileau\ORM\DataMapping\Annotation\Entity;
use function Symfony\Component\String\u;

/**
 * Class EntityReader
 * @package TBoileau\ORM\DataMapping\Reader
 */
class EntityReader implements EntityReaderInterface
{
    /**
     * @param ReflectionClass $class
     * @return Entity
     */
    public function read(ReflectionClass $class): Entity
    {
        /** @var Entity $entity */
        $entity = (new AnnotationReader())->getClassAnnotation($class, Entity::class);

        if ($entity->name === null) {
            $entity->name = u($class->getShortName())->snake();
        }

        return $entity;
    }
}
