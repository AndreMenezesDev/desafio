<?php

namespace App\Services\ClienteService\Actions;

use App\Dto\ClienteDto;
use App\Models\Cliente;

class ClienteBinding 
{
    public static function ModelToDto(Cliente $cliente): ClienteDto
    {
        $clienteDto = new ClienteDto();
        $clienteDto->id = $cliente->cli_id ?? null;
        $clienteDto->nome = $cliente->cli_nome;
        $clienteDto->sobrenome = $cliente->cli_sobrenome;
        $clienteDto->email = $cliente->cli_email;

        return $clienteDto;
    }

    public static function DtoToModel(ClienteDto $clienteDto): Cliente
    {
        $cliente = new Cliente();
        $cliente->cli_id = $clienteDto->id ?? null;
        $cliente->cli_nome = $clienteDto->nome;
        $cliente->cli_sobrenome = $clienteDto->sobrenome;
        $cliente->cli_email = $clienteDto->email;

        return $cliente;
    }
}
