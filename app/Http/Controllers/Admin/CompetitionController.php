<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AgeGroup;
use App\Models\Competition;
use App\Models\CompetitionType;
use Illuminate\Http\Request;


class CompetitionController extends Controller
{
    public function index()
    {
        $competitions = Competition::all();
        $types = CompetitionType::all(['id', 'name']);

        return view('admin.competitions.index', ['competitions' => $competitions, 'types' => $types]);
    }


    public function indexCompetitionType($id)
    {
        $type = CompetitionType::with('competitions')->where('id', $id)->firstOrFail();
        $types = CompetitionType::all(['id', 'name']);

        return view('admin.competitions.index_com_types', ['type' => $type, 'types' => $types]);
    }


    public function create()
    {
        $types = CompetitionType::all(['id', 'name']);

        return view('admin.competitions.create', ['types' => $types]);
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'types' => 'array',
            'types.*' => 'nullable|numeric',
        ]);

        if ($request->has('active')){
            $data['active'] = '1';
        }else{
            $data['active'] = '0';
        }

        $competition = new Competition($data);
        $competition->save();

        if (isset($data['types'])){
            $competition = Competition::with('types')->where('id', $competition->id)->firstOrFail();
            $competition->types()->attach($data['types']);
        }

        flash('Успешно.')->success();

        if ($request->has('btn_save_list')){
            return redirect()->route('admin.competitions.all.index');
        }elseif ($request->has('btn_save_edit')){
            return redirect()->route('admin.competitions.all.edit', ['id' => $competition->id]);
        }

        return back();
    }


    public function edit($id)
    {
        $competition = Competition::with(['types', 'ageGroups'])->where('id', $id)->firstOrFail();
        $types_all = CompetitionType::all(['id', 'name']);
        $age_groups = AgeGroup::all(['id', 'name']);

        return view('admin.competitions.edit', [
            'competition' => $competition,
            'types_all' => $types_all,
            'age_groups' => $age_groups
        ]);
    }


    public function update(Request $request, $id)
    {
//        dd($request->all());
        $data = $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'types' => 'array',
            'types.*' => 'nullable|numeric',
        ]);

        if ($request->has('active')){
            $data['active'] = '1';
        }else{
            $data['active'] = '0';
        }

        if ($request->hasFile('img')){
            $folder = date('Y/m/d');
            $img = $request->file('img')->store("images/competition/$folder");
            $data['img'] = $img;
        }

        $competition = Competition::with(['types'])->where('id', $id)->firstOrFail();

        if ($request->has('delete_img')){
            $old_file = storage_path('app/public') . '/' . $competition->img;
            if (is_file($old_file)){
                unlink($old_file);
            }
            $data['img'] = null;
        }

        $competition->update($data);

        $all_types_ids = array_keys(CompetitionType::all('id')->keyBy('id')->toArray());
        if ($all_types_ids){
            $competition->types()->detach($all_types_ids);
            if (isset($data['types'])){
                $competition->types()->attach($data['types']);
            }
        }

        flash('Успешно.')->success();
        if ($request->has('btn_save_list')){
            return redirect()->route('admin.competitions.all.index');
        }

        return back();
    }


    public function attachAgeGroup(Request $request, $id)
    {
        $data = $request->validate([
            'age_group' => 'nullable|numeric'
        ]);

        $competition = Competition::with(['ageGroups'])->where('id', $id)->firstOrFail();

        if (isset($data['age_group'])){
            $competition->ageGroups()->attach($data['age_group']);
        }

        flash('Успешно.')->success();

        return back();
    }


    public function detachAgeGroup(Request $request, $id)
    {
        $data = $request->validate([
            'age_group' => 'nullable|numeric'
        ]);

        $competition = Competition::with(['ageGroups'])->where('id', $id)->firstOrFail();

        if (isset($data['age_group'])){
            $competition->ageGroups()->detach($data['age_group']);
        }

        flash('Успешно.')->success();

        return back();
    }


    public function destroy($id)
    {
        $comp = Competition::with(['types', 'ageGroups'])->where('id', $id)->firstOrFail();
        $all_types = array_keys(CompetitionType::all('id')->keyBy('id')->toArray());
        $all_groups = array_keys(AgeGroup::all('id')->keyBy('id')->toArray());

        $comp->types()->detach($all_types);
        $comp->ageGroups()->detach($all_groups);

        $comp->delete();

        flash('Успешно.')->success();

        return back();
    }
}
