<?php

namespace App\Support\Traits;


trait Encryptable
{
    /**
     * Encryptable attributes
     *
     * @var array
     */
    protected $encryptable = [];

    /**
     * Get an attribute from model
     *
     * @param $key
     * @return string
     */
    public function getAttribute($key)
    {
        $value = parent::getAttribute($key);

        if (in_array($key, $this->encryptable)) {
            $value = decrypt($value);
        }

        return $value;
    }

    /**
     * Set an attribute for the model
     * 
     * @param $key
     * @param $value
     * @return mixed
     */
    public function setAttribute($key, $value)
    {
        if (in_array($key, $this->encryptable)) {
            $value = encrypt($value);
        }

        return parent::setAttribute($key, $value);
    }
}