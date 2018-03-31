<?php

namespace Kuldeep\EncryptionClient\lib;

/**
 * Description of EncryptionClientInterFace
 *
 * @author kuldeep
 */
interface EncryptionClientInterFace {
    
    /**
     * encrypt() - encrypt the provided text using the cypher key
     * @param type $input
     * @param type $cipherKey
     */
    public function encrypt($input, $cipherKey);
    
    /**
     * decrypt() - decrypt() the provided text using cypher key
     * @param type $cipher
     * @param type $cipherKey
     */
    public function decrypt($cipher, $cipherKey);
    
    /**
     * validate() - validate the input data
     * @param type $input
     * @param type $cipherKey
     */
    public function validate($input, $cipherKey);
}
