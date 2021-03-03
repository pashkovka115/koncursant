<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;


class PageController extends Controller
{
    public function index()
    {
        $pages = Page::all();

        return view('admin.pages.index', ['pages' => $pages]);
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'content' => 'nullable|string',
        ]);

        $page = new Page($data);
        $page->save();

        if ($page->id){
            flash('Успешно.')->success();
        }else{
            flash('Ошибка.')->error();
        }


        return back();
    }


    public function edit($id)
    {
        $page = Page::where('id', $id)->firstOrFail();

        return view('admin.pages.edit', ['page' => $page]);
    }


    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'content' => 'nullable|string'
        ]);

        if ($request->has('active')){
            $data['active'] = '1';
        }else{
            $data['active'] = '0';
        }

        $res = Page::where('id', $id)->update($data);

        if ($res){
            flash('Успешно.')->success();
        }else{
            flash('Ошибка.')->error();
        }

        if ($request->has('btn_save_list')){
            return redirect()->route('admin.pages.info.index');
        }elseif ($request->has('btn_save_edit')){
            return back();
        }
    }


    public function destroy($id)
    {
        $res = Page::where('id', $id)->delete();

        if ($res == 1){
            flash('Успешно.')->success();
        }else{
            flash('Ошибка.')->error();
        }

        return back();
    }
}
