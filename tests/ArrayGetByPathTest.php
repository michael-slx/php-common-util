<?php
declare(strict_types=1);

namespace PhpCommon\Tests\Util;

use PHPUnit\Framework\TestCase;
use function PhpCommon\Util\array_get_by_path;

class ArrayGetByPathTest extends TestCase {
    public function testNavigateByPath() {
        $subject = [
            ['a1' => 123, 'a2' => 32.1],
            ['abc', 'cba']
        ];

        self::assertEquals('cba', array_get_by_path($subject, '1.1'));
        self::assertEquals(32.1, array_get_by_path($subject, '0.a2'));
    }

    public function testEmptyPath() {
        $subject = [
            ['a1' => 123, 'a2' => 32.1],
            ['abc', 'cba']
        ];

        self::assertEquals($subject, array_get_by_path($subject, ''));
    }

    public function testReturnsDefault() {
        $subject = [
            ['a1' => 123, 'a2' => 32.1],
            ['abc', 'cba']
        ];

        $defaultValue = 'default';
        self::assertEquals($defaultValue, array_get_by_path($subject, 'doesNotExist', $defaultValue));
        self::assertEquals($defaultValue, array_get_by_path($subject, '0.a2.doesNotExist', $defaultValue));
    }
}