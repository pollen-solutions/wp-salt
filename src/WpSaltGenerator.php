<?php

declare(strict_types=1);

namespace Pollen\WpSalt;

use Laminas\Math\Rand;

class WpSaltGenerator implements WpSaltGeneratorInterface
{
    /**
     * List of authorized characters.
     * @var string $chars
     */
    private string $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!#$%&()*+,-./:;<=>?@[]^_`{|}~';

    /**
     * @inheritDoc
     */
    public function salt(): string
    {
        return Rand::getString(64, $this->chars);
    }
}
