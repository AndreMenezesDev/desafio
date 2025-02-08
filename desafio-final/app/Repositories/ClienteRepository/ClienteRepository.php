<?php

namespace App\Repositories\ClienteRepository;

use App\Dto\ClienteDto;
use App\Models\Cliente;
use App\Repositories\Base\QueryBuilderRepository;
use App\Services\ClienteService\Actions\ClienteBinding;
use Illuminate\Database\Eloquent\Collection;

class ClienteRepository extends QueryBuilderRepository implements IClienteRepository
{
    protected $table = 'sis_clientes';
    protected $primaryKey = 'cli_id';
    public $timestamps = false;


    public function counts(){
        return Cliente::count();
    }
    public function findByName(string $nome){
        return Cliente::where('cli_nome','LIKE', "%{$nome}%")->get();
    }

    public function getAll()
    {
        $lista = new Collection(Cliente::get());
        $lista_ = new Collection();
        foreach ($lista as $cliente) {
            $lista_->push(ClienteBinding::ModelToDto($cliente));
        }

        return $lista_;
    }

    public function create(array $data)
    {
        return Cliente::create($data);
    }

    public function delete(int $id)
    {
        return Cliente::where('cli_id', $id)->delete();
    }

    public function update(int $id, array $data)
    {
        return Cliente::where('cli_id', $id)->update($data);
    }
}