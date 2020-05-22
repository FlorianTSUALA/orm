<?php

namespace TBoileau\ORM\Tests\Fixtures;

use TBoileau\ORM\DataMapping\Annotation as ORM;

/**
 * Class Foo
 * @package TBoileau\ORM\Tests\Fixtures
 */
class Bar
{
    /**
     * @var int|null
     * @ORM\PrimaryKey(autoIncrement=true)
     * @ORM\Column(type="integer")
     */
    public ?int $id = null;

    /**
     * @var Foo
     * @ORM\HasOne(targetEntity="TBoileau\ORM\Tests\Fixtures\Foo", inversedBy="bars")
     */
    public Foo $foo;
}
