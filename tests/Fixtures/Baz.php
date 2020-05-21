<?php

namespace TBoileau\ORM\Tests\Fixtures;

use TBoileau\ORM\DataMapping\Annotation\BelongsToMany;

/**
 * Class Baz
 * @package TBoileau\ORM\Tests\Fixtures
 */
class Baz
{
    /**
     * @var Foo[]
     * @BelongsToMany(targetEntity="TBoileau\ORM\Tests\Fixtures\Foo", mappedBy="bazes")
     */
    public array $foos;
}
