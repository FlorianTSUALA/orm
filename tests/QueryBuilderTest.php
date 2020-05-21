<?php

namespace TBoileau\ORM\Tests;

use Exception\BadQueryException;
use PHPUnit\Framework\TestCase;
use TBoileau\ORM\QueryBuilder\QueryBuilder;

/**
 * Class QueryBuilderTest
 * @package TBoileau\Tests\ORM
 */
class QueryBuilderTest extends TestCase
{
    public function test a complex query()
    {
        $queryBuilder = new QueryBuilder();

        $select = "SELECT a.id, a.title, a.content, a.publishedAt";
        $from = "FROM article AS a";
        $joins = "JOIN a.comments AS c";
        $leftJoins = "LEFT JOIN c.user AS u";
        $where = "WHERE a.title LIKE :search AND a.publishedAt <= NOW()";
        $orWhere = "OR a.title LIKE 'ALERT !%'";
        $orderBy = "ORDER BY a.publishedAt DESC, a.title ASC";
        $limit = "LIMIT 0, 10";

        $query = sprintf(
            "%s %s %s %s %s %s %s %s",
            $select,
            $from,
            $joins,
            $leftJoins,
            $where,
            $orWhere,
            $orderBy,
            $limit
        );

        $queryBuilder
            ->select("a.id", "a.title", "a.content", "a.publishedAt")
            ->from("article", "a")
            ->join("a.comments", "c")
            ->leftJoin("c.user", "u")
            ->where("a.title LIKE :search")
            ->andWhere("a.publishedAt <= NOW()")
            ->orWhere("a.title LIKE 'ALERT !%'")
            ->orderBy(["a.publishedAt" => "DESC", "a.title" => "ASC"])
            ->limit(0, 10)
        ;

        $this->assertEquals($queryBuilder, $query);
    }

    public function test if query without select raise exception()
    {
        $queryBuilder = (new QueryBuilder())->from("article", "a");
        $this->expectException(BadQueryException::class);
        $queryBuilder->getQuery();
    }

    public function test if query without from raise exception()
    {
        $queryBuilder = (new QueryBuilder())->select("a.title");
        $this->expectException(BadQueryException::class);
        $queryBuilder->getQuery();
    }
}
