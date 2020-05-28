<?php

namespace TBoileau\ORM\Tests;

use PHPUnit\Framework\TestCase;
use TBoileau\ORM\DataMapping\Resolver\ColumnResolver;
use TBoileau\ORM\DataMapping\Resolver\MetadataResolver;
use TBoileau\ORM\DataMapping\Resolver\PrimaryKeyResolver;
use TBoileau\ORM\EntityManager;
use TBoileau\ORM\Reference;
use TBoileau\ORM\Tests\Fixtures\Entity\Foo;
use TBoileau\ORM\UnitOfWork;

/**
 * Class EntityManagerTest
 * @package TBoileau\ORM\Tests
 */
class EntityManagerTest extends TestCase
{
    public function test persist new entity()
    {
        $unitOfWork = new UnitOfWork(
            new MetadataResolver(
                new ColumnResolver(),
                new PrimaryKeyResolver()
            )
        );

        $entityManager = new EntityManager($unitOfWork);

        $foo = new Foo();

        $entityManager->persist($foo);

        $this->assertContains(
            $foo,
            array_map(fn (Reference $reference) => $reference->getEntity(), $unitOfWork->getNewEntityReferences())
        );

        $entityManager->flush();

        $this->assertContains(
            $foo,
            array_map(fn (Reference $reference) => $reference->getEntity(), $unitOfWork->getManagedEntityReferences())
        );

        $entityManager->remove($foo);

        $this->assertContains(
            $foo,
            array_map(fn (Reference $reference) => $reference->getEntity(), $unitOfWork->getRemovedEntityReferences())
        );

        $entityManager->flush();

        $this->assertNotContains(
            $foo,
            array_map(fn (Reference $reference) => $reference->getEntity(), $unitOfWork->getRemovedEntityReferences())
        );
    }
}
