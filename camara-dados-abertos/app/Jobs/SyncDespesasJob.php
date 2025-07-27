<?php

namespace App\Jobs;

use App\Services\CamaraApiService;
use App\Models\Despesa;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SyncDespesasJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $deputadoId;

    public function __construct($deputadoId)
    {
        $this->deputadoId = $deputadoId;
    }

    public function handle(CamaraApiService $api)
    {
        $despesas = $api->getDespesas($this->deputadoId);
        foreach ($despesas as $data) {
            Despesa::updateOrCreate(
                [
                    'deputado_id' => $this->deputadoId,
                    'documento' => $data['numeroDocumento'],
                    'data' => $data['dataDocumento']
                ],
                [
                    'tipo_despesa' => $data['tipoDespesa'],
                    'valor' => $data['valorLiquido'],
                    'fornecedor' => $data['nomeFornecedor']
                ]
            );
        }
    }
}
