<?php

namespace TBoileau\ORM\DataMapping\Metadata;

use ReflectionProperty;
use function Symfony\Component\String\u;

/**
 * Class ColumnMetadata
 * @package TBoileau\ORM\DataMapping\Metadata
 */
class ColumnMetadata extends PropertyMetadata
{
    /**
     * @var string
     */
    protected string $name;

    /**
     * @var string
     */
    protected string $type;

    /**
     * @var int|null
     */
    protected ?int $length;

    /**
     * @var bool
     */
    protected bool $unique;

    /**
     * @var int|null
     */
    protected ?int $precision;

    /**
     * @var int|null
     */
    protected ?int $scale;

    /**
     * ColumnMetadata constructor.
     * @param ReflectionProperty $property
     * @param string $name
     * @param string $type
     * @param int|null $length
     * @param bool $unique
     * @param int|null $precision
     * @param int|null $scale
     */
    public function __construct(
        ReflectionProperty $property,
        string $name,
        string $type,
        ?int $length,
        bool $unique,
        ?int $precision,
        ?int $scale
    ) {
        parent::__construct($property);
        $this->name = $name;
        $this->type = $type;
        $this->length = $length;
        $this->unique = $unique;
        $this->precision = $precision;
        $this->scale = $scale;
    }

    /**
     * @param object $entity
     * @return mixed
     */
    public function getValue(object $entity)
    {
        if ($this->property->isPublic()) {
            return $this->property->getValue($entity);
        }

        return $entity->{u(sprintf("get %s", $this->property->getName()))->camel()}();
    }

    /**
     * @return ReflectionProperty
     */
    public function getProperty(): ReflectionProperty
    {
        return $this->property;
    }

    /**
     * @param ReflectionProperty $property
     */
    public function setProperty(ReflectionProperty $property): void
    {
        $this->property = $property;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return int|null
     */
    public function getLength(): ?int
    {
        return $this->length;
    }

    /**
     * @param int|null $length
     */
    public function setLength(?int $length): void
    {
        $this->length = $length;
    }

    /**
     * @return bool
     */
    public function isUnique(): bool
    {
        return $this->unique;
    }

    /**
     * @param bool $unique
     */
    public function setUnique(bool $unique): void
    {
        $this->unique = $unique;
    }

    /**
     * @return int|null
     */
    public function getPrecision(): ?int
    {
        return $this->precision;
    }

    /**
     * @param int|null $precision
     */
    public function setPrecision(?int $precision): void
    {
        $this->precision = $precision;
    }

    /**
     * @return int|null
     */
    public function getScale(): ?int
    {
        return $this->scale;
    }

    /**
     * @param int|null $scale
     */
    public function setScale(?int $scale): void
    {
        $this->scale = $scale;
    }
}
