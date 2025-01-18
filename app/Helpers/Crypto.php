<?php

namespace App\Helpers;

class Crypto
{
    public static function encrypt($plainText, $key)
    {
        $secretKey = hex2bin(md5($key));
        $initVector = pack("C*", 0x00, 0x01, 0x02, 0x03, 0x04, 0x05, 0x06, 0x07, 0x08, 0x09, 0x0a, 0x0b, 0x0c, 0x0d, 0x0e, 0x0f);
        $encryptedText = openssl_encrypt($plainText, 'AES-128-CBC', $secretKey, OPENSSL_RAW_DATA, $initVector);
        return bin2hex($encryptedText);
    }

    public static function decrypt($encryptedText, $key)
    {
        $secretKey = hex2bin(md5($key));
        $initVector = pack("C*", 0x00, 0x01, 0x02, 0x03, 0x04, 0x05, 0x06, 0x07, 0x08, 0x09, 0x0a, 0x0b, 0x0c, 0x0d, 0x0e, 0x0f);
        $encryptedText = hex2bin($encryptedText);
        $decryptedText = openssl_decrypt($encryptedText, 'AES-128-CBC', $secretKey, OPENSSL_RAW_DATA, $initVector);
        return rtrim($decryptedText, "\0");
    }
}
