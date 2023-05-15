<?php

namespace App\Traits;

trait PrimeTrait
{
    public function isPrime($n):bool
    {
        if ($n <= 1) {
            return false;
        }
        for ($i = 2; $i <= sqrt($n); $i++) {
            if ($n % $i == 0) {
                return false;
            }
        }
        return true;
    }
}
