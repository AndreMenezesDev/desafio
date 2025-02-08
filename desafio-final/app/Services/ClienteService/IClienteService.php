<?php

namespace App\Services\ClienteService;

use App\Dto\ClienteDto;

interface IClienteService
{
    public function listarTodos();
    public function buscarPorId(int $id);
    public function buscarPorNome(string $nome);
    public function salvar(ClienteDto $cliente);
    public function atualizar(ClienteDto $cliente);
    public function deletar(int $id);
    public function contarClientes();

}