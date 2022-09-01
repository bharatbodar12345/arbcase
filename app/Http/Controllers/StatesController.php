<?php

namespace App\Http\Controllers;
use App\Models\Arbcase;
use App\Models\User;
use Illuminate\Http\Request;

class StatesController extends Controller
{
    public function status(Request $request) {
        $id =   $request->id;
        $status = $request->status;

        $data =Arbcase::select('arbcase.*')
        ->where('status',0)->where('id', $request->id)->get();



        // $data->save();
        // return redirect('/admin/postshow')->with('message', 'Status changed!');
        return $data;

    }

    public function updatedata(Request $request)
    {
        $id =   $request->id;
        $data = Arbcase::select('arbcase.*')->where('id', $id)->first();


        // foreach($data as $value) {
        //     dd($value->status);
        // }

        // $reqdata = $data->all();
        // dd($data->status);

        if($data->status == 0){

            $data->status = 1;
            $data->save();

        return $data;
    }
    }

    public function arbituser(Request $request)
    {
        $data = User::select('user.*')
        ->where('id', $request->id)->get();

        return $data;
    }



}
