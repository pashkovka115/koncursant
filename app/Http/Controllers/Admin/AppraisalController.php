<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appraisal;
use Illuminate\Http\Request;


class AppraisalController extends Controller
{
    public function index()
    {
        $appraisals = Appraisal::all();

        return view('admin.appraisals.index', compact('appraisals'));
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string'
        ]);

        $app = new Appraisal($data);
        $app->save();

        return back();
    }


    public function edit($id)
    {
        $appraisal = Appraisal::where('id', $id)->firstOrFail();

        return view('admin.appraisals.edit', compact('appraisal'));
    }


    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|string'
        ]);

        Appraisal::where('id', $id)->update($data);

        if ($request->has('btn_save_list')){
            return redirect()->route('admin.competitions.appraisal.index');
        }

        return back();
    }


    public function destroy($id)
    {
        $app = Appraisal::with('bids')->where('id', $id)->firstOrFail();
        if ($app->bids->count() > 0){
            flash()->error('Эта оценка используется в заявках. Вначале удалите заявки.');
            return back();
        }
        $app->delete();


        return back();
    }
}
