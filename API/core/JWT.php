<?php
require 'vendor/autoload.php';

use Firebase\JWT\JWT as FirebaseJWT;
use Firebase\JWT\Key;
use Firebase\JWT\ExpiredException;
use Firebase\JWT\SignatureInvalidException;

class JWT
{
    private string $secret;
    private string $algo;
    private int $leeway;

    public function __construct(string $secret, string $algo = 'HS256', int $leeway = 0)
    {
        $this->secret = $secret;
        $this->algo   = $algo;
        $this->leeway = $leeway;

        FirebaseJWT::$leeway = $leeway;
    }

    public function encode(array $payload, ?int $expiresIn = 3600): string
    {
        if ($expiresIn !== null) {
            $payload['iat'] = time();
            $payload['exp'] = time() + $expiresIn;
        }

        return FirebaseJWT::encode($payload, $this->secret, $this->algo);
    }

    public function decode(string $token): array
    {
        try {
            $decoded = FirebaseJWT::decode($token, new Key($this->secret, $this->algo));
            return (array) $decoded;
        } catch (ExpiredException $e) {
            throw new RuntimeException('Token expirado');
        } catch (SignatureInvalidException $e) {
            throw new RuntimeException('Firma inválida');
        } catch (Throwable $e) {
            throw new RuntimeException('Token inválido: ' . $e->getMessage());
        }
    }
}