<?php


use JetBrains\PhpStorm\Pure;

class encryption
{
    private static array $encryptionData;
    private static string $serverDecIV;
    private static string $serverDecKey;

    #[Pure] private function randomNumber($length): string
    {
        $result = '';

        for($i = 0; $i < $length; $i++) {
            $result .= mt_rand(0, 9);
        }
        return $result;
    }

    public function __construct()
    {
        self::$encryptionData =[
            'ciphering' => "aes-256-cbc",
            // Use OpenSSl Encryption method
            'iv_length' => openssl_cipher_iv_length('aes-256-cbc'),
            'options' => 0,
            ];
        if (file_exists('keys.json'))
        {
            $file = file_get_contents('keys.json');
            $json = json_decode($file, true);
            self::$serverDecIV = $json['serverDecIV'];
            self::$serverDecKey = $json['serverDecKey'];
        }
        else
            {
            self::$serverDecIV = self::randomNumber(16);
                try {
                    self::$serverDecKey = bin2hex(random_bytes('128'));
                }
                catch (Exception $e)
                {
                }
                $data =[
                'serverDecIV' => self::$serverDecIV,
                'serverDecKey' => self::$serverDecKey,
            ];
            $json = json_encode($data, true);
            file_put_contents('keys.json', $json);
        }
    }

    public function encrypt($data): bool|string
    {
        $encryptedValue = openssl_encrypt($data, self::$encryptionData['ciphering'],
            self::$serverDecKey, self::$encryptionData['options'], self::$serverDecIV);
        return ($encryptedValue);
    }

    public function decrypt($data): bool|string
    {
        $decryption=openssl_decrypt ($data, self::$encryptionData['ciphering'],
            self::$serverDecKey, self::$encryptionData['options'], self::$serverDecIV);
        return($decryption);
    }
}