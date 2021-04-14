<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompetitionTypeUpdate;
use App\Models\CompetitionType;
use Illuminate\Http\Request;


class CompetitionTypeController extends Controller
{
    public function index()
    {
        $competitions = CompetitionType::all();

        return view('admin.competition_types.index', ['competitions' => $competitions]);
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string'
        ]);

        $com = new CompetitionType($data);
        $com->save();

        flash('Успешно.')->success();

        return back();
    }


    public function edit($id)
    {
        $type = CompetitionType::where('id', $id)->firstOrFail();

        return view('admin.competition_types.edit', compact('type'));
    }


    public function update(CompetitionTypeUpdate $request, $id)
    {
        $data = $request->validated();

        CompetitionType::where('id', $id)->update($data);

        flash('Успешно.')->success();
        if ($request->has('btn_save_list')){
            return redirect()->route('admin.competitions.types.index');
        }
        return back();
    }


    public function destroy($id)
    {
        $type = CompetitionType::with('competitions')->where('id', $id)->firstOrFail();
        if ($type->competitions->count() > 0){
            $arr = [];
            foreach ($type->competitions as $competition){
                $arr[] = $competition->name;
            }
            $str = 'Этот тип не пустой. В нём находятся: ' . implode(', ', $arr);
            flash($str)->error();

            return back();
        }
        $type->delete();

        flash('Успешно.')->success();
        return back();
    }
}
