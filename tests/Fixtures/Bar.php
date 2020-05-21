<?php

namespace TBoileau\ORM\Tests\Fixtures;

use TBoileau\ORM\DataMapping\Annotation\HasOne;

/**
 * Class Foo
 * @package TBoileau\ORM\Tests\Fixtures
 */
class Bar
{
    /**
     * @var Foo
     * @HasOne(targetEntity="TBoileau\ORM\Tests\Fixtures\Foo", inversedBy="bars")
     */
    public Foo $foo;
}
