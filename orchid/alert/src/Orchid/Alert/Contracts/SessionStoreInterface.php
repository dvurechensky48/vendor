<?php

namespace Orchid\Alert\Contracts;

/**
 * Interface SessionStoreInterface.
 *
 * @category PHP
 */
interface SessionStoreInterface
{
    /**
     * Flash a message to the session.
     *
     * @param $name
     * @param $data
     */
    public function flash($name, $data);
}
