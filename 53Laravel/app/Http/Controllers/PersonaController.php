<?php

namespace App\Http\Controllers;

use App\Http\Requests\CrearPersona;
use App\Persona;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    public function index()
    {
        #$portafolio = Project::orderBy('created_at','DESC')->get(); ##Se obtiene del modelo y se ordena de manera descendente
        //$portafolio = Project::latest()->paginate(1);  //Pagina los resultados, pero se debera agregar el metodo 'links' en la vista
        $personas = Persona::latest()->get();  //Por defecto se ordena con la columna created_at

        return view('personas', compact('personas'));
    }

    public function show($personas){
        return view('show', [
            'personas' => Persona::findOrFail($personas)
        ]);
    }

    public function create(){
        return view('create');
    }

    public function store(CrearPersona $request){
        // Project::create([    ##Una forma de enviar los datos a la db
        //     'title' => request('title'),
        //     'description' => request('description'),
        // ]);

        ###Si las columnas en la db es igual al name de cada label
        ###se puede utilizar esta forma mas corta
        #Project::create(request())->only($fields);
        Persona::create([    ##Una forma de enviar los datos a la db
        'names' => request('names'),
        'lastname' => request('lastname'),
        'email' => request('email'),
        'birthdate' => request('birthdate'),
        'photo' => $this->photoPatch($request)
        ]);

        return redirect()->route('personas.index');
    }

    public function edit($personas){
        return view('actualizar', [
            'persona' => Persona::findOrFail($personas)
        ]);
    }

    protected $validationRules=[
        'photo' => 'required|image'
    ];

    public function update(Persona $personas, CrearPersona $request){
        $personas->update([
            'names' => request('names'),
            'lastname' => request('lastname'),
            'email' => request('email'),
            'birthdate' => request('birthdate'),
            'photo' => $this->photoPatch($request),
        ]);
        return redirect()->route('personas.show', $personas);
    }

    public function destroy(Persona $personas){
        $personas->delete();
        return redirect()->route('personas.index', $personas);
    }

    public function photoPatch($request){         ##Formatear el patch de la foto que posteriormente va a insertarse en la db
        $photoPatch = $request->file('photo')->store('public');
        return str_replace("public/","/storage/public/",$photoPatch);
    }
}
