<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Veiculos;

class HomeController extends Controller
{
    public function index(){
        return view('meus_veiculos');
    }

    public function getAllveiculos(){
        $veiculos = Veiculos::select('id', 'description', 'value')->get()->toJson(JSON_PRETTY_PRINT);
        return response($veiculos, 200);
    }

    public function getVeiculo($id){
        if (Veiculos::where('id', $id)->exists()) {
            $veiculo = Veiculos::select('description', 'value')->where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($veiculo, 200);
        }else{
            return response()->json([
                "message" => "Expense not found"
            ], 404);
        }
    }

    public function simulacaoValores(Request $request){
        $valor = $request->valor;
        $valorEntrada = $request->valorSimulado;
        if (!empty($valor) && !empty($valorEntrada)) {
            $valores = array(
                "numeroParcela_6" => ($valor - $valorEntrada) / 6,
                "numeroParcela_12" => ($valor - $valorEntrada) / 12,
                "numeroParcela_48" => ($valor - $valorEntrada) / 48
            );
            $valoresVeiculo = json_encode($valores);

            return response($valoresVeiculo, 200);
        }else{
            return response()->json([
                "message" => "Veiculo not found"
            ], 404);
        }
    }
}
