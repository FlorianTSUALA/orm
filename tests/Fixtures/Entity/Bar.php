<?php

namespace TBoileau\ORM\Tests\Fixtures\Entity;

use TBoileau\ORM\DataMapping\Annotation as ORM;

/**
 * Class Foo
 * @package TBoileau\ORM\Tests\Fixtures\Entity
 * @ORM\Entity
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
     * @ORM\HasOne(targetEntity="TBoileau\ORM\Tests\Fixtures\Entity\Foo", inversedBy="bars")
     */
    public Foo $foo;
}
