<?php

namespace Kuldeep\EncryptionClient\lib;
use Kuldeep\EncryptionClient\lib\EncryptionClientInterFace;
/**
 * Description of OpenSSLFactory
 *
 * @author kuldeep
 */
class OpenSSLFactory implements EncryptionClientInterFace{
    
    /**
     * encrypt() - Encrypt the given data using the provided cipherKey
     * @param type $plain
     * @param type $cipherKey
     * @return type
     * @throws \RuntimeException
     */
    public function encrypt($plain, $cipherKey){
     
        $this->validate($plain, $cipherKey); //validate the data
        
        $method = 'AES-256-CBC';
        $ivSize = \openssl_cipher_iv_length($method);

        $iv = openssl_random_pseudo_bytes($ivSize);
        
        if (($cipher = $iv . \openssl_encrypt($plain, $method, $cipherKey, 0, $iv)) === false)
        {
            throw new \RuntimeException('Error during encryption procedure.');
        }
        
        $cipher = base64_encode($cipher);
        
        return $cipher;
        
    }
    
    /**
     * decrypt() - Decrypt the given cipher by using provided CipherKey
     * @param type $cipher
     * @param type $cipherKey
     * @return type
     * @throws \RuntimeException
     */
    public function decrypt($cipher, $cipherKey){
        
        $this->validate($cipher, $cipherKey);//validate the data
        
        $cipher = base64_decode($cipher);
        
        $method = 'AES-256-CBC';
        $ivSize = openssl_cipher_iv_length($method);

        $iv = mb_substr($cipher, 0, $ivSize, '8bit');

        $cipher = mb_substr($cipher, $ivSize, null, '8bit');
        
        if (($data = openssl_decrypt($cipher, $method, $cipherKey, 0, $iv)) === false)
        {
            throw new \RuntimeException('Error during decryption procedure.');
        }
        
        return $data;
    }
    
    /**
     * validate() - validate the provided $input data
     * @param type $input
     * @param type $cipherKey
     * @throws \InvalidArgumentException
     */
    public function validate($input, $cipherKey){
        if(empty($input)){
            
            throw new \InvalidArgumentException('Input data must not be empty.');
            
        }elseif(empty($cipherKey)){
            
            throw new \InvalidArgumentException('Secret key must not be empty.');
        }
    }
    
}
