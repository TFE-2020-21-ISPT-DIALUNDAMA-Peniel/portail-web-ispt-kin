<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ressource;
use DataTables;
class RessourceController extends Controller
{
    public function getRessources(Request $request)
    {
        if ($request->ajax()) {
            $data = Ressource::all();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $classe = "btn-success";
                    $txt = "Activer";
                    if ($row->status) {
                        $classe = " btn-danger";
                        $txt = "Desactiver";
                    }
                    //$actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-'.$classe.' btn-sm">'.$txt.'</a>';
                    $actionBtn = "
                    <Form action='".route('ressources.destroy',$row->id)."' method='POST'>
                        <input type='hidden' name='_token' value='".csrf_token()."'>
                        <input type='hidden' name='_method' value='DELETE'>
                        <a href='".route('ressources.edit',$row->id)."' class='edit btn btn-success btn-sm'> <span class='fa fa-edit'></span> </a>
                        <button onclick='return confirm(`Etes-vous sûr de vouloir supprimé ?`)' type='submit' class='btn btn-danger'><span class='fa fa-trash'></span> </button> </Form>";

                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function addRessourceForm(Request $request) {

        // Form validation
        $this->validate($request, [
            'libele' => 'required',
            'url'=>'required|url',
            'description' => 'required'
         ]);

        //  Store data in database
        'App\Models\Ressource'::create($request->all());
        //
        return redirect()->route('dashboard')->with('success', 'Les données ont été enregistrées avec succès.');
    }

    public function edit(Ressource $ressource)
    {
        return view('ressources.edit',compact('ressource'));
    }
      /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ressource $ressource)
    {
        $request->validate([
            'libele' => 'required',
            'url'=>'required|url',
            'description' => 'required'
        ]);

        $ressource->update($request->all());

        return redirect()->route('dashboard')
            ->with('success','Les données ont été mise à jour');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ressource $ressource)
    {
        $ressource->delete();

        return redirect()->route('dashboard')
            ->with('success','Ressource supprimée');
    }
}
