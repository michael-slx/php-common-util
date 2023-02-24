<?php
declare(strict_types=1);

namespace PhpCommon\Tests\Util;

use PhpCommon\Util\Exception\UnsupportedPlatformException;
use PHPUnit\Framework\TestCase;
use function PhpCommon\Util\platform_is_windows;
use function PhpCommon\Util\platform_require_windows;

class PlatformRequireWindowsTest extends TestCase {
    public function testRequireWindows() {
        if (platform_is_windows()) {
            $this->expectNotToPerformAssertions();
        } else {
            $this->expectException(UnsupportedPlatformException::class);
        }

        platform_require_windows();
    }
}