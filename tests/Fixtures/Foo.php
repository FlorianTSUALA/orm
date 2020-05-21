<?php

namespace TBoileau\ORM\Tests\Fixtures;

use TBoileau\ORM\DataMapping\Annotation\BelongsTo;
use TBoileau\ORM\DataMapping\Annotation\BelongsToMany;
use TBoileau\ORM\DataMapping\Annotation\HasMany;
use TBoileau\ORM\DataMapping\Annotation\HasOne;

/**
 * Class Foo
 * @package TBoileau\ORM\Tests\Fixtures
 */
class Foo
{
    /**
     * @var Quux
     * @HasOne(targetEntity="TBoileau\ORM\Tests\Fixtures\Quux", inversedBy="foos")
     */
    public Quux $quux;

    /**
     * @var Baz[]
     * @HasMany(targetEntity="TBoileau\ORM\Tests\Fixtures\Baz", inversedBy="foos")
     */
    public array $bazes;

    /**
     * @var Bar[]
     * @BelongsTo(targetEntity="TBoileau\ORM\Tests\Fixtures\Bar", mappedBy="foo")
     */
    public array $bars;

    /**
     * @var Qux[]
     * @BelongsToMany(targetEntity="TBoileau\ORM\Tests\Fixtures\Qux", mappedBy="foos")
     */
    public array $quxes;
}
