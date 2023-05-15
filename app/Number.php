<?php

namespace App;

use App\Traits\PrimeTrait;

class Number
{
    use PrimeTrait;

    protected $start;
    protected $end;
    protected $numbers;

    public function __construct($start, $end)
    {
        $this->start = $start;
        $this->end = $end;
        $this->numbers = array();
        $this->populateNumbers();
    }

    protected function populateNumbers():void
    {
        for ($i = $this->start; $i <= $this->end; $i++) {
            $factors = $this->getFactors($i);
            $this->numbers[$i] = $factors;
        }
    }

    public function getFactors($n):array
    {
        $factors = array();
        for ($i = 1; $i <= $n; $i++) {
            if ($n % $i == 0) {
                $factors[] = $i;
            }
        }
        if ($this->isPrime($n)) {
            $factors[] = 'PRIME';
        }
        return $factors;
    }

    public function __toString():string
    {
        $output = '';
        foreach ($this->numbers as $number => $factors) {
            // Check if running in a browser
            $linebreak = (php_sapi_name() === 'cli') ? PHP_EOL : '<br>';
            $output .= $number . ' [' . implode(',', $factors) . ']' . $linebreak;
        }

        return $output;
    }

}

