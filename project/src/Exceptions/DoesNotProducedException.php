<?php

namespace src\Exceptions;

class DoesNotProducedException extends \Exception
{
    /**
     * @var string
     */
    private $reason;

    /**
     * @param string $reason
     */
    public function __construct(string $reason)
    {
        parent::__construct();

        $this->reason = $reason;
    }

    /**
     * @return string
     */
    public function getReason(): string
    {
        return $this->reason;
    }
}