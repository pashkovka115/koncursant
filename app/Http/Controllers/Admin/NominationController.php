<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Nomination;
use Illuminate\Http\Request;

class NominationController extends Controller
{
    public function index()
    {
        $nominations = Nomination::all();

        return view('admin.nominations.index', compact('nominations'));
    }


    public function store(Request $request)
    {
        $data = $request->validate(['name' => 'required|string']);
        $nom = new Nomination($data);
        $nom->save();

        return back();
    }


    public function edit($id)
    {
        $nomination = Nomination::where('id', $id)->firstOrFail();

        return view('admin.nominations.edit', compact('nomination'));
    }


    public function update(Request $request, $id)
    {
        $data = $request->validate(['name' => 'required|string']);
        Nomination::where('id', $id)->update($data);

        if ($request->has('btn_save_list')){
            return redirect()->route('admin.competitions.nominations.index');
        }

        return back();
    }


    public function destroy($id)
    {
        Nomination::where('id', $id)->delete();

        return back();
    }
}
