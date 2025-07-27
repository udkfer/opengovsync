<?php

namespace App\Jobs;

use App\Services\CamaraApiService;
use App\Models\Deputado;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SyncDeputadosJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function handle(CamaraApiService $api)
    {
        $deputados = $api->getDeputados();
        foreach ($deputados as $data) {
            Deputado::updateOrCreate(
                ['id' => $data['id']],
                [
                    'nome' => $data['nome'],
                    'partido' => $data['siglaPartido'],
                    'uf' => $data['siglaUf'],
                    'email' => $data['email'],
                    'foto_url' => $data['urlFoto']
                ]
            );
            SyncDespesasJob::dispatch($data['id'])->onQueue('despesas');
        }
    }
}
