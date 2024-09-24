<?php

namespace App\Http\Controllers;

use App\Models\EstrategiaWMS;
use App\Models\EstrategiaWMSHorarioPrioridade;
use Illuminate\Http\Request;

class EstrategiaWMSController extends Controller
{
    public function store(Request $request)
    {
        $estrategia = EstrategiaWMS::create([
            'ds_estrategia_wms' => $request->dsEstrategia,
            'nr_prioridade' => $request->nrPrioridade,
        ]);

        foreach ($request->horarios as $horario) {
            EstrategiaWMSHorarioPrioridade::create([
                'cd_estrategia_wms' => $estrategia->cd_estrategia_wms,
                'ds_horario_inicio' => $horario['dsHorarioInicio'],
                'ds_horario_final' => $horario['dsHorarioFinal'],
                'nr_prioridade' => $horario['nrPrioridade'],
            ]);
        }

        return response()->json(['message' => 'Estrategia criada com sucesso'], 201);
    }

    public function getPrioridade($cdEstrategia, $dsHora, $dsMinuto)
    {
        $horarioAtual = $dsHora . ':' . $dsMinuto;
        $horario = EstrategiaWMSHorarioPrioridade::where('cd_estrategia_wms', $cdEstrategia)
            ->where('ds_horario_inicio', '<=', $horarioAtual)
            ->where('ds_horario_final', '>=', $horarioAtual)
            ->first();

        if ($horario) {
            return response()->json(['nr_prioridade' => $horario->nr_prioridade]);
        }

        $estrategia = EstrategiaWMS::find($cdEstrategia);
        return response()->json(['nr_prioridade' => $estrategia->nr_prioridade]);
    }
}

