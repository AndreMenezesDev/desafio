<?php

namespace App\Repositories\Base;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

abstract class QueryBuilderRepository implements IRepositoryBase
{
    /**
    * Nome da tabela
    * @var string
     */
    protected $table;

    /**
     * Chave primaria Tabel
     * @var string
     */
    protected $primaryKey;

    /**
    * Retorna lista
     */
    public function getAll()
    {
        return new Collection(DB::table($this->table)->get());
    }

    /**
    * Retorna registro por id
     */
    public function findById(int $id)
    {
        return DB::table($this->table)->where($this->primaryKey, $id)->first();
    }

    /**
    * Atualiza um registro no banco
     */
    public function update(int $id, array $data)
    {
        return DB::table($this->table)->where('id', $id)->update($data);
    }

    /**
    * Apaga um registro no banco
    */
    public function delete(int $id)
    {
        return DB::table($this->table)->where('id', $id)->delete();
    }

}
