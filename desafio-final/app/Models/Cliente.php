<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = "sis_clientes";
    protected $primaryKey = "cli_id";


    protected $fillable = [
        'cli_nome',
        'cli_sobrenome',
        'cli_email',
    ];

    public function Array()
    {
        return [
            'cli_id' => $this->cli_id,
            'cli_nome' => $this->cli_nome,
            'cli_sobrenome' => $this->cli_sobrenome,
            'cli_email' => $this->cli_email,
        ];
    }

}
