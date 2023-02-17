<?php
declare(strict_types=1);

namespace PhpCommon\Util;

/**
 * Check if PHP is running on Windows
 *
 * @return bool `true` if PHP is running on Windows; `false` for other platforms
 */
function platform_is_windows(): bool {
    return PHP_OS_FAMILY === 'Windows';
}