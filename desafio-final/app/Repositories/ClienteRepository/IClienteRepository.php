<?php 

namespace App\Repositories\ClienteRepository;

use App\Models\Cliente;

interface IClienteRepository{
    public function getAll();
    public function findById(int $id);
    public function create(array $data);
    public function update(int $id, array $data);
    public function delete(int $id);
    public function counts();
    public function findByName(string $nome);
}