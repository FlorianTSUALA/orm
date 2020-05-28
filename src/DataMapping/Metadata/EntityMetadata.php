<?php

namespace TBoileau\ORM\DataMapping\Metadata;

/**
 * Class EntityMetadata
 * @package TBoileau\ORM\DataMapping\Metadata
 */
class EntityMetadata
{
    /**
     * @var string
     */
    private string $tableName;

    /**
     * @var string|null
     */
    private ?string $repositoryClass;

    /**
     * @var ColumnMetadata[]
     */
    private array $columns = [];

    /**
     * @var PrimaryKeyMetadata
     */
    private PrimaryKeyMetadata $primaryKey;

    /**
     * @var RelationMetadata[]
     */
    private array $relations;

    /**
     * EntityMetadata constructor.
     * @param string $tableName
     * @param string|null $repositoryClass
     */
    public function __construct(string $tableName, ?string $repositoryClass)
    {
        $this->tableName = $tableName;
        $this->repositoryClass = $repositoryClass;
    }

    /**
     * @return string
     */
    public function getTableName(): string
    {
        return $this->tableName;
    }

    /**
     * @param string $tableName
     */
    public function setTableName(string $tableName): void
    {
        $this->tableName = $tableName;
    }

    /**
     * @return string|null
     */
    public function getRepositoryClass(): ?string
    {
        return $this->repositoryClass;
    }

    /**
     * @param string|null $repositoryClass
     */
    public function setRepositoryClass(?string $repositoryClass): void
    {
        $this->repositoryClass = $repositoryClass;
    }

    /**
     * @param PropertyMetadata $propertyMetadata
     */
    public function addProperty(PropertyMetadata $propertyMetadata): void
    {
        if ($propertyMetadata instanceof PrimaryKeyMetadata) {
            $this->setPrimaryKey($propertyMetadata);
            return;
        }

        if ($propertyMetadata instanceof ColumnMetadata) {
            $this->addColumn($propertyMetadata);
            return;
        }

        $this->addRelation($propertyMetadata);
    }

    /**
     * @param ColumnMetadata $columnMetadata
     */
    public function addColumn(ColumnMetadata $columnMetadata): void
    {
        $this->columns[] = $columnMetadata;
    }

    /**
     * @return ColumnMetadata[]
     */
    public function getColumns(): array
    {
        return $this->columns;
    }

    /**
     * @param PrimaryKeyMetadata $primaryKeyMetadata
     */
    public function setPrimaryKey(PrimaryKeyMetadata $primaryKeyMetadata): void
    {
        $this->primaryKey = $primaryKeyMetadata;
    }

    /**
     * @return PrimaryKeyMetadata
     */
    public function getPrimaryKey(): PrimaryKeyMetadata
    {
        return $this->primaryKey;
    }

    /**
     * @param RelationMetadata $relationMetadata
     */
    public function addRelation(RelationMetadata $relationMetadata): void
    {
        $this->relations[] = $relationMetadata;
    }

    /**
     * @return RelationMetadata[]
     */
    public function getRelations(): array
    {
        return $this->relations;
    }
}
