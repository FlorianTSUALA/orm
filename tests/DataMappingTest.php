<?php

namespace TBoileau\ORM\Tests;

use Generator;
use PHPUnit\Framework\TestCase;
use TBoileau\ORM\DataMapping\Annotation\BelongsTo;
use TBoileau\ORM\DataMapping\Annotation\BelongsToMany;
use TBoileau\ORM\DataMapping\Annotation\HasMany;
use TBoileau\ORM\DataMapping\Annotation\HasOne;
use TBoileau\ORM\DataMapping\Reader\RelationReader;
use TBoileau\ORM\Tests\Fixtures\Bar;
use TBoileau\ORM\Tests\Fixtures\Baz;
use TBoileau\ORM\Tests\Fixtures\Foo;
use TBoileau\ORM\Tests\Fixtures\Quux;
use TBoileau\ORM\Tests\Fixtures\Qux;

/**
 * Class DataMappingTest
 * @package TBoileau\ORM\Tests
 */
class DataMappingTest extends TestCase
{
    /**
     * @dataProvider provideRelations
     * @param string $class
     * @param string $property
     * @param string $relation
     * @param string $targetEntity
     * @param string $targetProperty
     * @throws \ReflectionException
     */
    public function test read relation annotation(
        string $class,
        string $property,
        string $relation,
        string $targetEntity,
        string $targetProperty
    ) {
        $relationAnnotation = RelationReader::read(new \ReflectionProperty($class, $property));
        $this->assertInstanceOf($relation, $relationAnnotation);
        $this->assertEquals($targetEntity, $relationAnnotation->targetEntity);
        $this->assertEquals($targetProperty, $relationAnnotation->getTargetProperty());
    }

    /**
     * @return Generator
     */
    public function provideRelations(): Generator
    {
        yield[Foo::class, "bars", BelongsTo::class, Bar::class, "foo"];
        yield[Bar::class, "foo", HasOne::class, Foo::class, "bars"];

        yield[Foo::class, "quxes", BelongsToMany::class, Qux::class, "foos"];
        yield[Qux::class, "foos", HasMany::class, Foo::class, "quxes"];

        yield[Foo::class, "quux", HasOne::class, Quux::class, "foos"];
        yield[Quux::class, "foos", BelongsTo::class, Foo::class, "quux"];

        yield[Foo::class, "bazes", HasMany::class, Baz::class, "foos"];
        yield[Baz::class, "foos", BelongsToMany::class, Foo::class, "bazes"];
    }
}
