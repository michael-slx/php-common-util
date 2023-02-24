<?php
declare(strict_types=1);

namespace PhpCommon\Tests\Util;

use PhpCommon\Util\Exception\UnsupportedPlatformException;
use PHPUnit\Framework\TestCase;
use function PhpCommon\Util\platform_is_windows;
use function PhpCommon\Util\platform_require_not_windows;

class PlatformRequireNotWindowsTest extends TestCase {
    public function testRequireNotWindows() {
        if (!platform_is_windows()) {
            $this->expectNotToPerformAssertions();
        } else {
            $this->expectException(UnsupportedPlatformException::class);
        }

        platform_require_not_windows();
    }
}