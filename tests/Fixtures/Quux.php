<?php

namespace TBoileau\ORM\Tests\Fixtures;

use TBoileau\ORM\DataMapping\Annotation\BelongsTo;

/**
 * Class Quux
 * @package TBoileau\ORM\Tests\Fixtures
 */
class Quux
{
    /**
     * @var Foo[]
     * @BelongsTo(targetEntity="TBoileau\ORM\Tests\Fixtures\Foo", mappedBy="quux")
     */
    public array $foos;
}
