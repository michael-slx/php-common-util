<?php
declare(strict_types=1);

namespace PhpCommon\Tests\Util;

use PHPUnit\Framework\TestCase;
use function PhpCommon\Util\get_by_path;

final class TestTwoPropertyObject {
    public mixed $propertyA;
    public mixed $propertyB;

    public function __construct(mixed $propertyA, mixed $propertyB) {
        $this->propertyA = $propertyA;
        $this->propertyB = $propertyB;
    }
}

final class TestObject {
    public mixed $property;

    public function __construct(mixed $property) {
        $this->property = $property;
    }
}

class GetByPathTest extends TestCase {
    public function testNavigateByPath() {
        $subject = new TestTwoPropertyObject(
            new TestObject(['a1' => 123, 'a2' => 32.1]),
            ['abc', 'cba']
        );

        self::assertEquals('cba', get_by_path($subject, 'propertyB.property.1'));
        self::assertEquals(32.1, get_by_path($subject, 'propertyA.property.a2'));
    }

    public function testEmptyPath() {
        $subject = new TestTwoPropertyObject(
            new TestObject(['a1' => 123, 'a2' => 32.1]),
            ['abc', 'cba']
        );

        self::assertEquals($subject, get_by_path($subject, ''));
    }

    public function testReturnsPath() {
        $subject = new TestTwoPropertyObject(
            new TestObject(['a1' => 123, 'a2' => 32.1]),
            ['abc', 'cba']
        );

        $defaultValue = 'default';
        self::assertEquals($defaultValue, get_by_path($subject, 'doesNotExist', $defaultValue));
    }
}