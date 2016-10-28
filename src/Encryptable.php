<?php

namespace TaylorNetwork\ModelEncryption;

use TaylorNetwork\ModelEncryption\Exceptions\ModelEncryptionException;

trait Encryptable
{
    /**
     * Get an attribute from model
     *
     * @param $key
     * @return string
     */
    public function getAttribute($key)
    {
        $this->checkForEncryptableProperty();
        
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
        $this->checkFroEncryptableProperty();
        
        if (in_array($key, $this->encryptable)) {
            $value = encrypt($value);
        }

        return parent::setAttribute($key, $value);
    }
    
    /**
     * Check if the encryptable property is set.
     *
     * @return void
     * @throws ModelEncryptionException
     */
    private function checkForEncryptableProperty()
    {
        if(!isset($this->encryptable))
        {
            throw new ModelEncryptionException('Please set an encryptable property in model!');
        }
    }
}