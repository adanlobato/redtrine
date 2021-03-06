<?php

namespace Redtrine\Structure;

/**
 * Common base structure.
 */
abstract class Base
{
    protected $name;

    protected $key;

    protected $client;

    public function __construct($name)
    {
        $this->setName($name);
        $this->key = $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getKey()
    {
        return $this->key;
    }

    public function setClient($client)
    {
        $this->client = $client;
    }

    public function getClient()
    {
        return $this->client;
    }

    /**
     * Remove the structure from the underlying Redis database.
     *
     * @return array The number of keys that were removed.
     */
    public function destroy()
    {
        return $this->getClient()->del($this->getKey());
    }
}
