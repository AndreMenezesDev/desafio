<?php

namespace App\Services\ClienteService;

use App\Dto\ClienteDto;
use App\Models\Cliente;
use App\Repositories\ClienteRepository\IClienteRepository;
use App\Services\ClienteService\Actions\ClienteBinding;
use GuzzleHttp\Client;

class ClienteService implements IClienteService
{
    private IClienteRepository $repository;

    public function __construct(IClienteRepository $repository)
    {
        $this->repository = $repository;
    }

    public function listarTodos()
    {
        return $this->repository->getAll();
    }

    public function buscarPorId(int $id)
    {
        return $this->repository->findById($id);
    }

    public function buscarPorNome(string $nome)
    {
        return $this->repository->findByName($nome);
    }

    public function salvar(ClienteDto $cliente)
    {
        $clienteModel = ClienteBinding::DtoToModel($cliente);
        $clienteModel = $this->repository->create($clienteModel->toArray());
        return (ClienteBinding::ModelToDto($clienteModel));
    }
    
    public function atualizar(ClienteDto $cliente)
    {
        $clienteModel = ClienteBinding::DtoToModel($cliente);
        return  $clienteModel = $this->repository->update($clienteModel->cli_id, $clienteModel->toArray());
    }

    public function deletar(int $id)
    {
        return $this->repository->delete($id);
    }

    public function contarClientes()
    {
        return $this->repository->counts();
    }

    


}