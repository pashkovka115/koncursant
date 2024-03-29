<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index()
    {
        $ques = Question::all();

        return view('admin.questions.index', ['questions' => $ques]);
    }



    public function store(Request $request)
    {
        $data = $request->validate([
            'question' => 'required|string',
            'answer' => 'required|string',
        ]);

        if ($request->has('active')){
            $data['active'] = '1';
        }else{
            $data['active'] = '0';
        }

        $ques = new Question($data);
        $ques->save();

        if ($ques->id){
            flash('Успешно.')->success();
        }else{
            flash('Ошибка.')->error();
        }

        return back();
    }


    public function edit($id)
    {
        $question = Question::where('id', $id)->firstOrFail();

        return view('admin.questions.edit', ['question' => $question]);
    }


    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'question' => 'required|string',
            'answer' => 'required|string',
        ]);

        if ($request->has('active')){
            $data['active'] = '1';
        }else{
            $data['active'] = '0';
        }

        $res = Question::where('id', $id)->update($data);

        if ($res){
            flash('Успешно.')->success();
        }else{
            flash('Ошибка.')->error();
        }

        if ($request->has('btn_save_list')){
            return redirect()->route('admin.questions.index');
        }elseif ($request->has('btn_save_edit')){
            return back();
        }
    }


    public function destroy($id)
    {
        $res = Question::where('id', $id)->delete();

        if ($res == 1){
            flash('Успешно.')->success();
        }else{
            flash('Ошибка.')->error();
        }

        return back();
    }
}
