<?php declare(strict_types=1);

namespace Pollen\WpSalt;

interface WpSaltGeneratorInterface
{
    /**
     * Generate a 64 character salt string.
     *
     * @return string
     */
    public function salt(): string;
}
