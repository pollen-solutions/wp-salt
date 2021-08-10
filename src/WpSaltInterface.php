<?php

declare(strict_types=1);

namespace Pollen\WpSalt;

interface WpSaltInterface
{
    /**
     * Get the list of Wordpress salt strings.
     *
     * @return array<string, string>
     */
    public function getSalts(): array;

    /**
     * Generate the code of Wordpress salt for the wp-config.php file.
     *
     * @return string
     */
    public function wpConfigGenerator(): string;

    /**
     * Generate the code of Wordpress salt for a .env file.
     *
     * @return string
     */
    public function dotEnvGenerator(): string;
}
