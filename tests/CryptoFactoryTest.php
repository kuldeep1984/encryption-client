<?php

namespace Kuldeep\EncryptionClient\Test;

require_once __DIR__ . '/../vendor/autoload.php';

use Kuldeep\EncryptionClient\CryptoFactory;

/**
 * Description of CryptoFactoryTest
 *
 * @author kuldeep
 */
class CryptoFactoryTest extends \PHPUnit_Framework_TestCase {
    
    private $data = 'Kuldeep Test Message';
    
    private $cipher_key = 'jfgajdfuasdfakshd#sdaubfasud7j435jhb3j4b';
    
    /**
     * testUsage - Assert encryption and decryption
     */
    public function testUsage(){
        
        try{
            
            //Test Encryption
            $cryptoInstance = CryptoFactory::getCryptoInstance();
            $cipherText     = $cryptoInstance->encrypt($this->data, $this->cipher_key);
            $this->assertEquals(1, preg_match('#^[A-Za-z0-9+=/]{80}$#', $cipherText), 'encrypt() produced an unexpected result.');
            
            //Test Decryption
            $plainText     = $cryptoInstance->decrypt($cipherText, $this->cipher_key);
            $this->assertTrue(($plainText == $this->data), 'decryption failed.');
            
            
        }catch(RuntimeException $e){
            $this->markTestIncomplete(
                'This test has not been implemented yet.'
            );            
        }
    }
    
    
}
