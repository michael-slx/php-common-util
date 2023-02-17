<?php
declare(strict_types=1);

namespace PhpCommon\Tests\Util;

use PHPUnit\Framework\TestCase;
use function PhpCommon\Util\platform_is_windows;

class PlatformIsWindowsTest extends TestCase {
    public function testReturnsTrueIfOnWindows() {
        self::assertEquals(PHP_OS_FAMILY === 'Windows', platform_is_windows());
    }
}