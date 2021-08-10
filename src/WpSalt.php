<?php

declare(strict_types=1);

namespace Pollen\WpSalt;

class WpSalt implements WpSaltInterface
{
    /**
     * @inheritDoc
     */
    public function getSalts(): array
    {
        $generator = new WpSaltGenerator();

        $salts['AUTH_KEY'] = $generator->salt();
        $salts['SECURE_AUTH_KEY'] = $generator->salt();
        $salts['LOGGED_IN_KEY'] = $generator->salt();
        $salts['NONCE_KEY'] = $generator->salt();
        $salts['AUTH_SALT'] = $generator->salt();
        $salts['SECURE_AUTH_SALT'] = $generator->salt();
        $salts['LOGGED_IN_SALT'] = $generator->salt();
        $salts['NONCE_SALT'] = $generator->salt();

        return $salts;
    }

    /**
     * @inheritDoc
     */
    public function wpConfigGenerator(): string
    {
        $salts = $this->getSalts();

        return array_reduce(array_keys($salts), function ($saltsString, $key) use ($salts) {
            $saltsString .= PHP_EOL . "define('$key', '$salts[$key]');";
            return $saltsString;
        }, '');
    }

    /**
     * @inheritDoc
     */
    public function dotEnvGenerator(): string
    {
        $salts = $this->getSalts();

        return array_reduce(array_keys($salts), function ($saltsString, $key) use ($salts) {
            $saltsString .= PHP_EOL . "$key=\"$salts[$key]\"";
            return $saltsString;
        }, '');
    }
}
