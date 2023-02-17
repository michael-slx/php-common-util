<?php
declare(strict_types=1);

namespace PhpCommon\Tests\Util;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use function PhpCommon\Util\array_set_by_path;

class ArraySetByPath extends TestCase {
    public function testSetsByPath() {
        $subject = [
            ['a1' => 123, 'a2' => 32.1],
            ['abc', 'cba']
        ];

        array_set_by_path($subject, '0.a2', 321);

        self::assertEquals(321, $subject[0]['a2']);
    }

    public function testCreatesNewArrays() {
        $subject = [
            ['a1' => 123, 'a2' => 32.1],
            ['abc', 'cba']
        ];

        array_set_by_path($subject, '1.2.abc', 'cba');

        self::assertEquals(['abc' => 'cba'], $subject[1][2]);
    }

    public function testCreatesNewArraysByOverwriting() {
        $subject = [
            ['a1' => 123, 'a2' => 32.1],
            ['abc', 'cba']
        ];

        array_set_by_path($subject, '0.a1.a1a', 'cba');

        self::assertEquals(['a1a' => 'cba'], $subject[0]['a1']);
    }

    public function testFailsIfPathIsEmpty() {
        $subject = [];

        $this->expectException(InvalidArgumentException::class);
        array_set_by_path($subject, '', null);
    }
}