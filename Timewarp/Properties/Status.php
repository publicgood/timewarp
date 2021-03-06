<?php
/**
 * Timewarp
 *
 * @author    Warrick Bayman <me@warrickbayman.co.za>
 * @copyright Copyright (c) THEPUBLICGOOD (Pty) Ltd.
 * @license   MIT License http://opensource.org/licenses/MIT
 *
 */

namespace TPG\Timewarp\Properties;


use TPG\Timewarp\Components\Event;
use TPG\Timewarp\Components\Journal;
use TPG\Timewarp\Components\Todo;
use TPG\Timewarp\Exceptions\OutOfBoundsException;
use TPG\Timewarp\Properties\Types\EnumProperty;

class Status extends EnumProperty
{
    const
        CANCELLED = 'CANCELLED',
        COMPLETED = 'COMPLETED',
        CONFIRMED = 'CONFIRMED',
        DRAFT = 'DRAFT',
        FINAL = 'FINAL',
        INPROCESS = 'IN-PROCESS',
        NEEDSACTION = 'NEEDS-ACTION',
        TENTATIVE = 'TENTATIVE';



    protected $name = 'STATUS';
    protected $conformance = [Event::class, Todo::class, Journal::class];

    protected $values = [
        'CANCELLED',
        'COMPLETED',
        'CONFIRMED',
        'DRAFT',
        'FINAL',
        'IN-PROCESS',
        'NEEDS-ACTION',
        'TENTATIVE',
    ];

    protected function permittedValue(string $value): bool
    {
        return in_array($value, $this->values);
    }

    /**
     * Status constructor.
     * @param string $value
     * @throws OutOfBoundsException
     */
    public function __construct(string $value)
    {
        if (!$this->permittedValue($value)) {
            throw new OutOfBoundsException($this, $value);
        }

        parent::__construct($value);
    }


}
