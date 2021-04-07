<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AgeGroup;
use App\Models\Competition;
use App\Models\CompetitionType;
use Illuminate\Http\Request;


class AgeGroupController extends Controller
{
    public function index()
    {
        $groups = AgeGroup::all();
        $all_types = CompetitionType::all(['id', 'name']);

        return view('admin.age_groups.index', ['groups' => $groups, 'all_types' => $all_types]);
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'age' => 'nullable|string',
            'price' => 'nullable|string',
        ]);

        $group = new AgeGroup([
            'name' => $data['name'],
            'age' => $data['age'],
            'price' => $data['price'],
        ]);
        $group->save();

        flash('Успешно.')->success();

        return back();
    }


    public function edit($id)
    {
        $group = AgeGroup::where('id', $id)->firstOrFail();
        $all_types = CompetitionType::all();

        return view('admin.age_groups.edit', ['group' => $group, 'all_types' => $all_types]);
    }


    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'age' => 'nullable|string',
            'price' => 'nullable|string',
        ]);

        $group = AgeGroup::where('id', $id)->firstOrFail();
        $group->update([
            'name' => $data['name'],
            'age' => $data['age'],
            'price' => $data['price'],
        ]);

        flash('Успешно.')->success();
        if ($request->has('btn_save_list')){
            return redirect()->route('admin.competitions.age_group.index');
        }

        return back();
    }


    public function destroy($id)
    {
        $group = AgeGroup::with('competitions')->where('id', $id)->firstOrFail();
        if ($group->competitions->count() > 0){
            $arr = [];
            foreach ($group->competitions as $competition){
                $arr[] = $competition->name;
            }
            flash('Эта группа есть в конкурсах. ' . implode(', ', $arr))->error();
            return back();
        }

        $group->delete();
        flash('Успешно.')->success();

        return back();
    }
}
