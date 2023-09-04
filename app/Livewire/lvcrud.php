<?php

namespace App\Livewire;

use App\Models\estudiante;
use Livewire\Component;
use Livewire\WithPagination;



class lvcrud extends Component
{
use WithPagination;

     public $buscar="";
     public $nombre,$edad,$direccion,$correo,$id;
     protected $rules = [
    'nombre'=> 'required|String|min:3|max:255',
    'direccion'=> ['required', 'regex:/^[A-Za-z0-9\s#\-]+$/','min:5'],   
    'edad' =>'required|integer|between:1,100',    
    'correo' => 'required|email',
];

 
    public function updated($atributos)
    {
      $this->validateOnly($atributos);
    }

    public function store(){

      $validado= $this->validate($this->rules);
      estudiante::create($validado);
      $this->clear();
    }
    public function clear(){

      $this->nombre="";
      $this->direccion="";
      $this->edad="";
      $this->correo="";
      $this->id=0;
    }
    public function edit($id){
        $this->clear();
        $estudiante=estudiante::find($id);
        $this->id=$id;
        $this->nombre=$estudiante->nombre;
        $this->direccion=$estudiante->direccion;
        $this->edad=$estudiante->edad;
        $this->correo=$estudiante->correo;

    }
    public function update($id){

        $validado= $this->validate($this->rules);
        $es = estudiante::find($id);
        $es->update($validado);
        $this->clear();
    }

    public function delete($id){
        estudiante::find($id)->delete();
    }

    public function render()
    {
        if($this->buscar==""){
            $estudiante= estudiante::paginate(6);
        }else{
           $estudiante =estudiante::where('nombre', 'LIKE', '%' . $this->buscar . '%')->paginate(6);
        }
        return view('livewire.lvcrud',compact('estudiante'));
    }
   
}
