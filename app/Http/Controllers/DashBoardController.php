<?php

namespace App\Http\Controllers;

use App\Models\Medicamento;
use App\Models\Report;
use App\Models\User;


class DashBoardController extends Controller
{

    public function index(){
        $users = User::all()->count();
        $clientes = User::whereHas("roles", function($q){$q->where("name", 'Cliente');})->count();
        $gerentes = User::whereHas("roles", function($q){$q->where("name", 'Gerente');})->count();
        $farmaceuticos = User::whereHas("roles", function($q){$q->where("name", 'Farmacéutico');})->count();

        $reports = Report::all()->count();

        $medicines = Medicamento::all()->count();
        $medicinesDesc = Medicamento::where('precioDescuento' , '!=' , null)->count();
        $medicinesDescuento = Medicamento::orderBy('precioDescuento', 'DESC')->where('precioDescuento' , '!=' , null)
        ->take(5)->get();

        $junio = Medicamento::whereMonth('created_at', 6)->count();
        $julio = Medicamento::whereMonth('created_at', 7)->count();
        $agosto = Medicamento::whereMonth('created_at', 8)->count();
        $septiembre = Medicamento::whereMonth('created_at', 9)->count();
        $octubre = Medicamento::whereMonth('created_at', 10)->count();
        $noviembre = Medicamento::whereMonth('created_at', 11)->count();
        $diciembre = Medicamento::whereMonth('created_at', 12)->count();

        $resentUsers = User::orderBy('created_at', 'DESC')->take(6)->get();

        $suma = Medicamento::sum('precioNormal');

        $porcent =  ($medicinesDesc * $medicines) / 100;

        return view('dashboard', compact(
            'users',
            'reports',
            'porcent',
            'suma',
            'farmaceuticos',
            'gerentes',
            'clientes',
            'medicinesDescuento',
            'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre',
           'resentUsers'
            ));
    }
}
