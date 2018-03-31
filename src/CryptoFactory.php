<?php

namespace Kuldeep\EncryptionClient;
use Kuldeep\EncryptionClient\lib\OpenSSLFactory;

/**
 * Description of CryptoFactory 
 * @author kuldeep
 */
class CryptoFactory{    
    /**
     * getCryptoInstance() - Get Encryption Method Type Instance
     * @param type $crypto_type
     * @return OpenSSLFactory
     */
    public static function getCryptoInstance($crypto_type = 'openssl'){
        
        switch($crypto_type){
           
            case 'openssl':
                return new OpenSSLFactory();
                break;
            
            default:
                break;
            
        }
        
    }
    
}
