<?php

namespace TBoileau\ORM\Tests;

use PHPUnit\Framework\TestCase;
use TBoileau\ORM\DataMapping\Resolver\ColumnResolver;
use TBoileau\ORM\DataMapping\Resolver\MetadataResolver;
use TBoileau\ORM\DataMapping\Resolver\PrimaryKeyResolver;
use TBoileau\ORM\Reference;
use TBoileau\ORM\Tests\Fixtures\Entity\Foo;
use TBoileau\ORM\UnitOfWork;

/**
 * Class UnitOfWorkTest
 * @package TBoileau\ORM\Tests
 */
class UnitOfWorkTest extends TestCase
{
    public function test new entity in unit of work()
    {
        $unitOfWork = new UnitOfWork(new MetadataResolver(
            new ColumnResolver(),
            new PrimaryKeyResolver()
        ));

        $foo = new Foo();

        $unitOfWork->addNewEntity($foo);

        $this->assertContains(
            $foo,
            array_map(fn (Reference $reference) => $reference->getEntity(), $unitOfWork->getNewEntityReferences())
        );
    }

    public function test managed entity in unit of work()
    {
        $unitOfWork = new UnitOfWork(new MetadataResolver(
            new ColumnResolver(),
            new PrimaryKeyResolver()
        ));

        $foo = new Foo();

        $unitOfWork->addManagedEntity($foo);

        $this->assertContains(
            $foo,
            array_map(fn (Reference $reference) => $reference->getEntity(), $unitOfWork->getManagedEntityReferences())
        );

        $unitOfWork->addRemovedEntity($foo);

        $this->assertContains(
            $foo,
            array_map(fn (Reference $reference) => $reference->getEntity(), $unitOfWork->getRemovedEntityReferences())
        );

        $this->assertNotContains(
            $foo,
            array_map(fn (Reference $reference) => $reference->getEntity(), $unitOfWork->getManagedEntityReferences())
        );
    }
}
