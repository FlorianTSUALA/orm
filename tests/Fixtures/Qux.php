<?php

namespace TBoileau\ORM\Tests\Fixtures;

use TBoileau\ORM\DataMapping\Annotation as ORM;

/**
 * Class Qux
 * @package TBoileau\ORM\Tests\Fixtures
 */
class Qux
{
    /**
     * @var int|null
     * @ORM\PrimaryKey(autoIncrement=true)
     * @ORM\Column(type="integer")
     */
    public ?int $id = null;

    /**
     * @var Foo[]
     * @ORM\HasMany(targetEntity="TBoileau\ORM\Tests\Fixtures\Foo", inversedBy="quxes")
     */
    public array $foos;
}
