<?php

namespace TBoileau\ORM\QueryBuilder;

use TBoileau\ORM\QueryBuilder\Exception\BadQueryException;

/**
 * Class QueryBuilder
 * @package TBoileau\ORM\QueryBuilder
 */
class QueryBuilder
{
    /**
     * @var array
     */
    private array $select = [];

    /**
     * @var array
     */
    private array $from = [];

    /**
     * @var array
     */
    private array $joins = [];

    /**
     * @var array
     */
    private array $leftJoins = [];

    /**
     * @var array
     */
    private array $where = [];

    /**
     * @var array
     */
    private array $orWhere = [];

    /**
     * @var array
     */
    private array $orderBy = [];

    /**
     * @var int
     */
    private int $offset = 0;

    /**
     * @var int|null
     */
    private ?int $length = null;

    /**
     * @param mixed ...$fields
     * @return $this
     */
    public function select(...$fields): self
    {
        $this->select = array_unique(array_merge($this->select, $fields));
        return $this;
    }

    /**
     * @param string $table
     * @param string $alias
     * @return $this
     */
    public function from(string $table, string $alias): self
    {
        $this->from[$alias] = $table;
        return $this;
    }

    /**
     * @param string $relation
     * @param string $alias
     * @return $this
     */
    public function join(string $relation, string $alias): self
    {
        $this->joins[$alias] = $relation;
        return $this;
    }

    /**
     * @param string $relation
     * @param string $alias
     * @return $this
     */
    public function leftJoin(string $relation, string $alias): self
    {
        $this->leftJoins[$alias] = $relation;
        return $this;
    }

    /**
     * @param string $predicate
     * @return $this
     */
    public function where(string $predicate): self
    {
        $this->where[] = $predicate;
        return $this;
    }

    /**
     * @param string $predicate
     * @return $this
     */
    public function andWhere(string $predicate): self
    {
        $this->where[] = $predicate;
        return $this;
    }

    /**
     * @param string $predicate
     * @return $this
     */
    public function orWhere(string $predicate): self
    {
        $this->orWhere[] = $predicate;
        return $this;
    }

    public function orderBy(array $orderBy): self
    {
        $this->orderBy = $orderBy;
        return $this;
    }

    /**
     * @param int $offset
     * @param int $length
     * @return $this
     */
    public function limit(int $offset, int $length): self
    {
        $this->offset = $offset;
        $this->length = $length;
        return $this;
    }

    /**
     * @return string
     */
    public function getQuery(): string
    {
        if (count($this->select) === 0) {
            throw new BadQueryException("Missing select statement.");
        }

        if (count($this->from) === 0) {
            throw new BadQueryException("Missing from statement.");
        }

        $select = sprintf("SELECT %s", implode(", ", $this->select));

        $from = count($this->from) > 0 ? sprintf(
            "FROM %s",
            implode(
                ", ",
                array_map(
                    fn (string $alias, string $table) => sprintf("%s AS %s", $table, $alias),
                    array_keys($this->from),
                    array_values($this->from)
                )
            )
        ) : "";

        $joins = count($this->joins) > 0 ? implode(" ", array_map(
            fn (string $alias, string $relation) => sprintf("JOIN %s AS %s", $relation, $alias),
            array_keys($this->joins),
            array_values($this->joins)
        )) : "";

        $leftJoins = count($this->leftJoins) > 0 ? implode(" ", array_map(
            fn (string $alias, string $relation) => sprintf("LEFT JOIN %s AS %s", $relation, $alias),
            array_keys($this->leftJoins),
            array_values($this->leftJoins)
        )) : "";

        $where = count($this->where) > 0 ? sprintf("WHERE %s", implode(" AND ", $this->where)) : "";

        $orWhere = count($this->orWhere) > 0 ? sprintf("OR %s", implode(" OR ", $this->orWhere)) : "";

        $orderBy = count($this->orderBy) > 0 ? sprintf(
            "ORDER BY %s",
            implode(
                ", ",
                array_map(
                    fn (string $field, string $order) => sprintf("%s %s", $field, $order),
                    array_keys($this->orderBy),
                    array_values($this->orderBy)
                )
            )
        ) : "";

        $limit = $this->length !== null ? sprintf("LIMIT %d, %d", $this->offset, $this->length) : "";

        return trim(sprintf(
            "%s %s %s %s %s %s %s %s",
            $select,
            $from,
            $joins,
            $leftJoins,
            $where,
            $orWhere,
            $orderBy,
            $limit
        ));
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getQuery();
    }
}
