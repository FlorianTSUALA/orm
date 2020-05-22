<?php

namespace TBoileau\ORM\Tests\Fixtures\Entity;

use TBoileau\ORM\DataMapping\Annotation as ORM;

/**
 * Class Baz
 * @package TBoileau\ORM\Tests\Fixtures\Entity
 * @ORM\Entity
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
     * @ORM\BelongsToMany(targetEntity="TBoileau\ORM\Tests\Fixtures\Entity\Foo", mappedBy="bazes")
     */
    public array $foos;
}
