<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AgeGroup;
use App\Models\Competition;
use App\Models\CompetitionType;
use App\Models\Nomination;
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
            'competition_type_id' => 'required|numeric',
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
        $competition = Competition::with(['type', 'ageGroups', 'nominations'])->where('id', $id)->firstOrFail();
        $types_all = CompetitionType::all(['id', 'name']);
        $age_groups = AgeGroup::all(['id', 'name']);
        $nominations = Nomination::all(['id', 'name']);

        return view('admin.competitions.edit', [
            'competition' => $competition,
            'types_all' => $types_all,
            'age_groups' => $age_groups,
            'nominations' => $nominations
        ]);
    }


    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'competition_type_id' => 'required|numeric',
        ]);

        if ($request->has('active')){
            $data['active'] = '1';
        }else{
            $data['active'] = '0';
        }

        $folder = date('Y/m/d');

        if ($request->hasFile('img')){
            $img = $request->file('img')->store("images/competition/$folder");
            $data['img'] = $img;
        }
        if ($request->hasFile('bg_img')){
            $img = $request->file('bg_img')->store("images/competition/$folder");
            $data['bg_img'] = $img;
        }

        $competition = Competition::where('id', $id)->firstOrFail();

        if ($request->has('delete_img')){
            $old_file = storage_path('app/public') . '/' . $competition->img;
            if (is_file($old_file)){
                unlink($old_file);
            }
            $data['img'] = null;
        }
        if ($request->has('delete_bg_img')){
            $old_file = storage_path('app/public') . '/' . $competition->bg_img;
            if (is_file($old_file)){
                unlink($old_file);
            }
            $data['bg_img'] = null;
        }

        $competition->update($data);

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


    public function attachNomination(Request $request, $id)
    {
        $data = $request->validate([
            'nomination_id' => 'nullable|numeric'
        ]);

        $competition = Competition::with(['nominations'])->where('id', $id)->firstOrFail();

        if (isset($data['nomination_id'])){
            $competition->nominations()->attach($data['nomination_id']);
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


    public function detachNomination(Request $request, $id)
    {
        $data = $request->validate([
            'nomination_id' => 'nullable|numeric'
        ]);

        $competition = Competition::with(['nominations'])->where('id', $id)->firstOrFail();

        if (isset($data['nomination_id'])){
            $competition->nominations()->detach($data['nomination_id']);
        }

        flash('Успешно.')->success();

        return back();
    }


    public function destroy($id)
    {
        $comp = Competition::with(['type', 'ageGroups'])->where('id', $id)->firstOrFail();
        $all_groups = array_keys(AgeGroup::all('id')->keyBy('id')->toArray());

        $comp->ageGroups()->detach($all_groups);

        $comp->delete();

        flash('Успешно.')->success();

        return back();
    }
}
