<?php

namespace TBoileau\ORM\DataMapping\Metadata;

use ReflectionProperty;

/**
 * Class PrimaryKeyMetadata
 * @package TBoileau\ORM\DataMapping\Metadata
 */
class PrimaryKeyMetadata extends ColumnMetadata
{
    /**
     * @var bool
     */
    private bool $autoIncrement;

    /**
     * PrimaryKeyMetadata constructor.
     * @param ReflectionProperty $property
     * @param string $name
     * @param string $type
     * @param int|null $length
     * @param bool $unique
     * @param int|null $precision
     * @param int|null $scale
     * @param bool $autoIncrement
     */
    public function __construct(
        ReflectionProperty $property,
        string $name,
        string $type,
        ?int $length,
        bool $unique,
        ?int $precision,
        ?int $scale,
        bool $autoIncrement
    ) {
        parent::__construct($property, $name, $type, $length, $unique, $precision, $scale);
        $this->autoIncrement = $autoIncrement;
    }

    /**
     * @return bool
     */
    public function isAutoIncrement(): bool
    {
        return $this->autoIncrement;
    }

    /**
     * @param bool $autoIncrement
     */
    public function setAutoIncrement(bool $autoIncrement): void
    {
        $this->autoIncrement = $autoIncrement;
    }
}
