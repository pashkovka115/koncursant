<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TariffStore;
use App\Http\Requests\TariffUpdate;
use App\Models\Tariff;
use Illuminate\Http\Request;

class TariffController extends Controller
{
    public function index()
    {
        $tariffs = Tariff::all();

        return view('admin.tariff.index', ['tariffs' => $tariffs]);
    }


    public function create()
    {
        //
    }


    public function store(TariffStore $request)
    {
        $data = $request->validated();
        $tariff = new Tariff($data);
        $tariff->save();

        return back();
    }


    public function edit($id)
    {
        $tariff = Tariff::where('id', $id)->firstOrFail();

        return view('admin.tariff.edit', compact('tariff'));
    }


    public function update(TariffUpdate $request, $id)
    {
        $data = $request->validated();

        Tariff::where('id', $id)->update($data);

        if ($request->has('btn_save_list')){
            return redirect()->route('admin.competitions.tariffs.index');
        }

        return back();
    }


    public function destroy($id)
    {
        Tariff::where('id', $id)->delete();

        return back();
    }
}
