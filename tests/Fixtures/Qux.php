<?php

namespace TBoileau\ORM\Tests\Fixtures;

use TBoileau\ORM\DataMapping\Annotation\HasMany;

/**
 * Class Qux
 * @package TBoileau\ORM\Tests\Fixtures
 */
class Qux
{
    /**
     * @var Foo[]
     * @HasMany(targetEntity="TBoileau\ORM\Tests\Fixtures\Foo", inversedBy="quxes")
     */
    public array $foos;
}
