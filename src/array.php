<?php
declare(strict_types=1);

namespace PhpCommon\Util;

/**
 * Get a value from a multi-level array using a path
 *
 * This function navigates a multi-level tree of arrays using a given path and returns the referenced leaf or branch
 * node. If the given path does not reference an existing node, the `$default` value is returned.
 *
 * Path components are separated by a dot character (`.`).
 *
 * @param array $subject Subject tree to be navigated
 * @param string $path Path string
 * @param mixed|null $default Default value
 * @return mixed|null Referenced value if it exists; `$default` otherwise
 */
function array_get_by_path(array $subject, string $path, mixed $default = null): mixed {
    if (empty($path))
        return $subject;

    $pathParts = explode('.', $path);
    $node = $subject;
    foreach ($pathParts as $pathPart) {
        if (!is_array($node))
            return $default;
        $node = $node[$pathPart] ?? $default;
    }

    return $node ?? $default;
}

/**
 * Set a value in a multi-level array using a path
 *
 * This function navigates a multi-level tree of arrays using a given path and sets the given value to the referenced
 * node. If the given path does not reference an existing node, arrays will be created in place of the missing nodes.
 *
 * Path components are separated by a dot character (`.`).
 *
 * @param array& $subject Subject tree to be navigated
 * @param string $path Path string
 * @param mixed|null $value Value to set
 * @return void
 */
function array_set_by_path(array &$subject, string $path, mixed $value): void {
    // TODO: Implement array_set_by_path function
}