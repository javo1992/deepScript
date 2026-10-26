<?php

class ArticuloList extends ApiEndpoint
{
    public function index(array $params): array
    {
        // Aquí tu consulta PDO / ORM
        return [
            ['id' => 1, 'titulo' => 'Primer artículo'],
            ['id' => 2, 'titulo' => 'Segundo artículo'],
        ];
    }
}