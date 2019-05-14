<?php

namespace Canvas\Tests\Helpers;

use Canvas\SuffixedNumber;
use Canvas\Tests\TestCase;

class SuffixedNumberTest extends TestCase
{
    /**
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function return_an_unformatted_number()
    {
        static $number = 899;

        $this->assertEquals((string) $number, SuffixedNumber::format($number));
    }

    /** @test */
    public function return_a_precision_formatted_number()
    {
        static $number = 12345;

        $this->assertEquals('12.345K', SuffixedNumber::format($number, 3));
    }

    /** @test */
    public function return_a_formatted_number_in_thousands()
    {
        static $number = 899999;

        $this->assertEquals('900K', SuffixedNumber::format($number));
    }

    /** @test */
    public function return_a_formatted_number_in_millions()
    {
        static $number = 899999999;

        $this->assertEquals('900M', SuffixedNumber::format($number));
    }

    /** @test */
    public function return_a_formatted_number_in_billions()
    {
        static $number = 899999999999;

        $this->assertEquals('900B', SuffixedNumber::format($number));
    }

    /** @test */
    public function return_a_formatted_number_in_trillions()
    {
        static $number = 899999999999999;

        $this->assertEquals('900T', SuffixedNumber::format($number));
    }
}
