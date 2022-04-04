<?php

namespace App\Services;

use App\Models\NotaServico;
use PJBank\Package\Services\ValidateTrait;

final class ExtratoService
{
    use ValidateTrait;

    public function __construct(private NotaServico $notaServico)
    {
    }

    public function cadastrarNovaNotaServico($data)
    {
        $newData = $this->validate($data, [
            'valor_extrato' => 'required|numeric',
            'credencial' => 'required|string|min:40|max:40',
            'uuid' => 'required|uuid',
            'cobranca_id' => 'required|uuid',
            'movimentacao' => 'required',
        ]);

        if ($newData['movimentacao'] == 'debito') {
            return $this->notaServico->create([
                'credencial' => $newData['credencial'],
                'extrato_id' => $newData['uuid'],
                'cobranca_id' => $newData['cobranca_id'],
                'valor_nota' => $newData['valor_extrato'],
            ]);
        }
    }
}
