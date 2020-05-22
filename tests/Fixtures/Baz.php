<?php

namespace TBoileau\ORM\Tests\Fixtures;

use TBoileau\ORM\DataMapping\Annotation as ORM;

/**
 * Class Baz
 * @package TBoileau\ORM\Tests\Fixtures
 */
class Baz
{
    /**
     * @var int|null
     * @ORM\PrimaryKey(autoIncrement=true)
     * @ORM\Column(type="integer")
     */
    public ?int $id = null;

    /**
     * @var Foo[]
     * @ORM\BelongsToMany(targetEntity="TBoileau\ORM\Tests\Fixtures\Foo", mappedBy="bazes")
     */
    public array $foos;
}
