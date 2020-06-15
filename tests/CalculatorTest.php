<?php
namespace IW\Workshop;
use PHPUnit\Framework\Exception;
use PHPUnit\Framework\Error\Error;
use PHPUnit\Framework\TestCase;
use InvalidArgumentException;
use TypeError;

class CalculatorTest extends TestCase {
  public function testAdd() {
    $calculator = new Calculator();
    $result = $calculator->add(3.552, 5.226);

    $this->assertEquals(3.552 + 5.226, $result);
  }

  public function testAddStrings() {
    $calculator = new Calculator();

    $this->expectException(TypeError::class);
    $calculator->add("a", "b");
  }

  public function testDivide() {
    $calculator = new Calculator();
    $result = $calculator->divide(3.5, 5.2);

    $this->assertEquals(3.5 / 5.2, $result);
  }

  public function testDivideStrings() {
    $calculator = new Calculator();

    $this->expectException(TypeError::class);
    $calculator->add("a", "b");
  }

  public function testDivisionByZero() {
    $calculator = new Calculator();

    $this->expectException(InvalidArgumentException::class);
    $calculator->divide(3.5, 0);
  }
}