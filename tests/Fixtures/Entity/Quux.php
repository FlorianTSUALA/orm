<?php

namespace TBoileau\ORM\Tests\Fixtures\Entity;

use TBoileau\ORM\DataMapping\Annotation as ORM;

/**
 * Class Quux
 * @package TBoileau\ORM\Tests\Fixtures\Entity
 * @ORM\Entity
 */
class Quux
{
    /**
     * @var int|null
     * @ORM\PrimaryKey(autoIncrement=true)
     * @ORM\Column(type="integer")
     */
    public ?int $id = null;

    /**
     * @var Foo[]
     * @ORM\BelongsTo(targetEntity="TBoileau\ORM\Tests\Fixtures\Entity\Foo", mappedBy="quux")
     */
    public array $foos;
}
