<?php
declare(strict_types=1);

class ApiEndpoint
{
    protected string $authLevel;
    protected ?array $user = null;

    public function __construct(string $authLevel = 'required')
    {
        $this->authLevel = $authLevel;
        $this->authenticate();
    }

    protected function authenticate(): void
    {
        if ($this->authLevel === 'none') {
            return;
        }

        $header = $_SERVER['HTTP_AUTHORIZATION'] ?? '';

        if (!preg_match('/^Bearer\s+(.+)$/i', $header, $m)) {
            if ($this->authLevel === 'required') {
                $this->abort(401, 'Token no proporcionado');
            }
            return; // optional: sin token, se sigue como anónimo
        }

        try {
            $cfg   = require __DIR__ . '/../config.php';
            $jwt   = new JWT($cfg['jwt_secret']);
            $this->user = $jwt->decode($m[1]);
        } catch (Throwable $e) {
            if ($this->authLevel === 'required') {
                $this->abort(401, 'Token inválido: ' . $e->getMessage());
            }
        }
    }

    /** Ejecuta la acción indicada en routes.php */
    public function handle(string $action, array $params): void
    {
        if (!method_exists($this, $action)) {
            $this->abort(500, "Acción '$action' no implementada en " . static::class);
        }

        $result = $this->{$action}($params);

        // Si el método no devuelve nada, se asume que ya llamó a json()/abort()
        if ($result !== null) {
            $this->json(200, ['success' => true, 'data' => $result]);
        }
    }

    // ---------- Helpers ----------

    protected function json(int $status, array $payload): void
    {
        http_response_code($status);
        echo json_encode($payload, JSON_UNESCAPED_UNICODE);
        exit;
    }

    protected function abort(int $status, string $message): void
    {
        $this->json($status, ['success' => false, 'error' => $message]);
    }

    protected function user(): ?array
    {
        return $this->user;
    }

    protected function requireUser(): array
    {
        if ($this->user === null) {
            $this->abort(401, 'Autenticación requerida');
        }
        return $this->user;
    }
}