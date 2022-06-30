<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;
use App\Models\Especie;
use Illuminate\Support\Facades\DB;

class AnimalController extends Controller
{
    public function listaAnimais(){
        return DB::table("animal AS a")
                    ->join("especie AS e", "a.especie_id", "=", "e.id")
                    ->select("a.*", "e.descricao AS nome_especie")
                    ->get();
    }
    public function index()
    {
        $animal = new Animal();
        $animals = $this->listaAnimais();
        $especies = Especie::All();
        return view("animal.index",[
            "animal" => $animal,
            "animals" => $animals,
            "especies" => $especies
        ]);
    }


    public function store(Request $request)
    {
        if ($request->get("id") != "") {
            $animal = Animal::Find($request->get("id"));
        } else {
            $animal = new Animal();
        }
        $animal->nome = $request->get("nome");
        $animal->nome_dono = $request->get("nome_dono");
        $animal->raca = $request->get("raca");
        $animal->especie_id = $request->get("especie_id");
        $animal->data_nascimento = $request->get("data_nascimento");
        $animal->save();
        $request->session()->get("status", "salvo");

        return redirect("/animal");
    }

    
    public function edit($id)
    {
        $animal = Animal::Find($id);
        $animals = $this->listaAnimais;
        $especies = Especie::All();
        return view("animal.index",[
            "animal" => $animal,
            "animals" => $animals,
            "especies" => $especies
        ]);
    }


    public function destroy(Request $request, $id)
    {
        Animal::Destroy($id);
        $request->session()->get("status", "excluido");
        return redirect("/animal");
    }
}
