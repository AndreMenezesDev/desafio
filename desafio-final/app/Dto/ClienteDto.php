<?php

namespace App\Dto;

use App\Dto\Base\FiltroBaseDto;

class ClienteDto
{
    public ?int $id;
    public ?string $nome;
    public ?string $sobrenome;
    public ?string $email;

    public function __construct($request = null) {

        if ($request != null) {
            $this->id = $request->get('id') ?? null;
            $this->nome = $request->get('nome') ?? null;
            $this->sobrenome = $request->get('sobrenome') ?? null;
            $this->email = $request->get('email') ?? null;
        }
        
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'nome' => $this->nome,
            'sobrenome' => $this->sobrenome,
            'email' => $this->email,
        ];
    }
}