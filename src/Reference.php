<?php

namespace TBoileau\ORM;

/**
 * Class Reference
 * @package TBoileau\ORM
 */
class Reference
{
    /**
     * @var object
     */
    private object $entity;

    /**
     * @var string
     */
    private string $objectId;

    /**
     * @var mixed
     */
    private $primaryKey;

    /**
     * @var string
     */
    private string $state;

    /**
     * Reference constructor.
     * @param object $entity
     * @param null|mixed $primaryKey
     * @param string $state
     */
    public function __construct(object $entity, $primaryKey, string $state)
    {
        $this->entity = $entity;
        $this->objectId = spl_object_id($entity);
        $this->primaryKey = $primaryKey;
        $this->state = $state;
    }

    /**
     * @return object
     */
    public function getEntity(): object
    {
        return $this->entity;
    }

    /**
     * @return string
     */
    public function getObjectId(): string
    {
        return $this->objectId;
    }

    /**
     * @return mixed
     */
    public function getPrimaryKey()
    {
        return $this->primaryKey;
    }

    /**
     * @return string
     */
    public function getState(): string
    {
        return $this->state;
    }

    /**
     * @param string $state
     */
    public function setState(string $state): void
    {
        $this->state = $state;
    }
}
