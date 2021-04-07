<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PriceUpdate;
use App\Models\Price;
use Illuminate\Http\Request;


class PriceController extends Controller
{
    public function edit()
    {
        $price = Price::first();
        if (!$price){
            $price = $this->mock_obj();
        }

        return view('admin.price.edit', compact('price'));
    }


    public function update(PriceUpdate $request, $id)
    {
        $data = $request->validated();
        Price::where('id', $id)->update($data);

        return back();
    }


    private function mock_obj()
    {
        $class = new \stdClass();
        $price = [
            'id' => 1,
            'thanks_teacher' => 0,
            'diploma' => 0,
            'diploma_kollective_electro' => 0,
            'diploma_print_solist' => 0,
            'diploma_print_kollective' => 0,
            'general_diplom_print' => 0,
            'discount' => 0,
            'cnt_person' => 0,
            'max_quantity_participants_price' => 0,
        ];

        foreach ($price as $var => $value){
            $class->$var = $value;
        }

        return $class;
    }
}
