<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;


class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();

        return view('admin.contacts.index', ['contacts' => $contacts]);
    }


    public function edit($id)
    {
        $contact = Contact::where('id', $id)->firstOrFail();

        return view('admin.contacts.edit', ['contact' => $contact]);
    }


    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'value' => 'nullable|string',
            'value2' => 'nullable|string',
            'description' => 'nullable|string',
        ]);

        Contact::where('id', $id)->update($data);

        flash('Успешно.')->success();
        if ($request->has('btn_save_list')){
            return redirect()->route('admin.pages.contacts.index');
        }elseif ($request->has('btn_save_edit')){
            return back();
        }
    }
}
