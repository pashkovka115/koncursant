<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jury;
use Illuminate\Http\Request;

class JuryController extends Controller
{
    public function index()
    {
        $jury = Jury::all();

        return view('admin.jury.index', ['jury' => $jury]);
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            "name" => "required|string",
        ]);

        if ($request->hasFile('img')) {
            $folder = date('Y/m/d');
            $img = $request->file('img')->store("images/jury/$folder");
            $data['img'] = $img;
        }

        if ($request->has('active')){
            $data['active'] = '1';
        }else{
            $data['active'] = '0';
        }

        $jury = new Jury($data);
        $jury->save();

        return back();
    }


    public function edit($id)
    {
        $person = Jury::where('id', $id)->firstOrFail();

        return view('admin.jury.edit', ['person' => $person]);
    }


    public function update(Request $request, $id)
    {
        $data = $request->validate([
            "name" => "required|string",
            "direction" => "nullable|string",
            "profession" => "nullable|string",
            "description" => "nullable|string",
            "ducation" => "nullable|string",
            "geography_of_work" => 'nullable|string',
        ]);

        $person = Jury::where('id', $id)->firstOrFail();

        if ($request->hasFile('img')) {
            $folder = date('Y/m/d');
            $img = $request->file('img')->store("images/jury/$folder");
            $data['img'] = $img;

            $old_file = storage_path('app/public') . '/' . $person->img;
            if (is_file($old_file)){
                unlink($old_file);
            }
        }

        if ($request->has('delete_img')){
            $old_file = storage_path('app/public') . '/' . $person->img;
            if (is_file($old_file)){
                unlink($old_file);
            }
            $data['img'] = null;
        }

        if ($request->has('active')){
            $data['active'] = '1';
        }else{
            $data['active'] = '0';
        }

        $person->update($data);

        if ($request->has('btn_save_list')){
            return redirect()->route('admin.jury.index');
        }elseif ($request->has('btn_save_edit')){
            return back();
        }
    }


    public function destroy($id)
    {
        Jury::where('id', $id)->delete();

        return back();
    }
}
