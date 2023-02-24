<?php
declare(strict_types=1);

namespace PhpCommon\Util;

use PhpCommon\Util\Exception\UnsupportedPlatformException;

/**
 * Check if PHP is running on Windows
 *
 * @return bool `true` if PHP is running on Windows; `false` for other platforms
 */
function platform_is_windows(): bool {
    return PHP_OS_FAMILY === 'Windows';
}

/**
 * Require that this script is running on Windows
 *
 * @return void if this script is running on Windows
 * @throws UnsupportedPlatformException if this script is not running on Windows
 */
function platform_require_windows(): void {
    // TODO: Implement platform_require_windows function
}