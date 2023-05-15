<?php

namespace Tests\Unit;

use App\Number;
use App\Traits\PrimeTrait;
use PHPUnit\Framework\TestCase;

class NumberTest extends TestCase
{
    use PrimeTrait;
    public function test_is_prime()
    {
        $number = new Number(1, 100);

        $this->assertTrue($number->isPrime(2));
        $this->assertTrue($number->isPrime(23));
        $this->assertTrue($number->isPrime(83));

        $this->assertFalse($number->isPrime(4));
        $this->assertFalse($number->isPrime(12));
        $this->assertFalse($number->isPrime(98));

    }

    public function test_numbers()
    {
        $number = new Number(1, 100);

        $this->assertSame([1], $number->getFactors(1));
        $this->assertSame([1, 2, 4, 8, 16, 32, 64], $number->getFactors(64));
        $this->assertSame([1, 3, 7, 21], $number->getFactors(21));

    }

    public function test_prime_numbers_are_labeled_as_prime()
    {
        $numbers = new Number(1, 10);
        $count = substr_count($numbers, 'PRIME');

        $this->assertStringContainsString('PRIME', (string) $numbers);
        $this->assertEquals(4, $count);
    }

    public function test_non_prime_numbers_are_labeled_as_non_prime()
    {
        $numbers = new Number(1, 10);

        $this->assertStringContainsString('[1]', (string) $numbers);
        $this->assertStringContainsString('[1,2,4]', (string) $numbers);
        $this->assertStringContainsString('[1,2,3,6]', (string) $numbers);
        $this->assertStringContainsString('[1,2,4,8]', (string) $numbers);
        $this->assertStringContainsString('[1,3,9]', (string) $numbers);
        $this->assertStringContainsString('[1,2,5,10]', (string) $numbers);
    }

    public function test_to_string_returns_correct_output()
    {
        $number = new Number(1, 3);

        $expectedOutput = "1 [1]\n2 [1,2,PRIME]\n3 [1,3,PRIME]\n";

        $this->assertEquals($expectedOutput, $number->__toString());
    }

}
