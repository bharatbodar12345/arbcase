<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Arbcase;
use App\Models\User;
use Response;
use Illuminate\Support\Facades\Auth;


class ArbcaseController extends Controller
{
    public function arbcase() {
        $page = Arbcase::with(['arbuser1'])->get();
        return $page;
    }

    public function arbcaseid($id) {
        $users = Arbcase::where('arbcase', $id)->first()->get();
        dd($users);

        return view(compact('users'));

    }

    public function arbcaseuser() {
        // $user = Auth::user()->id;
        // dd($user);
        $user = Auth::user()->id;
        $data= Arbcase::select('arbcase.*', 'cli.name as cliname', 'arb.name as arbname','eli.elib as elibrary', 'eli.area as eli', 'eli.lkdlink as elilkdlink', 'eli.experience as eliexperience')

                ->leftJoin('user as cli', 'arbcase.user1', '=', 'cli.id')
                ->leftJoin('user as arb', 'arb.id', '=' ,'arbcase.arbid')
                ->leftJoin('arb_data as eli', 'eli.arb_id', '=', 'arbcase.arbid')
                ->where('arbcase.arbid',$user)
                ->get();
                return $data;
    }
    public function arbid() {
                // dd('hello');
                $user = Auth::user()->id;
                $Orders = Arbcase ::where('id',$user)->get();
                return $Orders;

    }

    public function ongoingdata() {
        $user = Auth::user()->id;
        // dd($user);
        $data= Arbcase::select('arbcase.*', 'cli.name as cliname', 'arb.name as arbname', 'joincode.name as name', 'joincode.joinCode as code')

                ->leftJoin('user as cli', 'arbcase.user1', '=', 'cli.id')
                ->leftJoin('user as arb', 'arb.id', '=' ,'arbcase.arbid')
                ->leftJoin('user_involved_in_agreement_arb as joincode', 'joincode.id', '=' ,'arbcase.user2d')
                // ->where('arbcase.arbid',$user)
                ->where('arbcase.status', 1)
                ->where('arbcase.arbsts', 1)
                ->where('arbcase.arbrej','!=', 1)
                ->where('arbcase.arbid', $user)
                ->get();
                return $data;

}

public function closed() {
    $user = Auth::user()->id;
    // dd($user);
    $data= Arbcase::select('arbcase.*', 'cli.name as cliname', 'arb.name as arbname', 'joincode.name as name', 'joincode.joinCode as code')

            ->leftJoin('user as cli', 'arbcase.user1', '=', 'cli.id')
            ->leftJoin('user as arb', 'arb.id', '=' ,'arbcase.arbid')
            ->leftJoin('user_involved_in_agreement_arb as joincode', 'joincode.id', '=' ,'arbcase.user2d')
            // ->where('arbcase.arbid',$user)
            ->where('arbcase.status', 3)
            ->where('arbcase.arbsts',1)
            // ->where('arbcase.arbrej','!=', 1)
            ->where('arbcase.arbid', $user)
            ->where('arbcase.closed_by', $user)
            ->get();
            return $data;

}

public function NewRequest() {
    $user = Auth::user()->id;
    // dd($user);
    $data= Arbcase::select('arbcase.*', 'cli.name as cliname', 'arb.name as arbname', 'joincode.name as name', 'joincode.joinCode as code')

            ->leftJoin('user as cli', 'arbcase.user1', '=', 'cli.id')
            ->leftJoin('user as arb', 'arb.id', '=' ,'arbcase.arbid')
            ->leftJoin('user_involved_in_agreement_arb as joincode', 'joincode.id', '=' ,'arbcase.user2d')
            // ->where('arbcase.arbid',$user)
            ->where('arbcase.status', 1)
            ->where('arbcase.arbsts', 0)
            ->where('arbcase.arbrej', 0)
            ->where('arbcase.arbid', $user)
            ->get();
            return $data;

}

public function Reject() {
    $user = Auth::user()->id;
    // dd($user);
    $data= Arbcase::select('arbcase.*', 'cli.name as cliname', 'arb.name as arbname', 'joincode.name as name', 'joincode.joinCode as code')

            ->leftJoin('user as cli', 'arbcase.user1', '=', 'cli.id')
            ->leftJoin('user as arb', 'arb.id', '=' ,'arbcase.arbid')
            ->leftJoin('user_involved_in_agreement_arb as joincode', 'joincode.id', '=' ,'arbcase.user2d')
            // ->where('arbcase.arbid',$user)
            ->where('arbcase.status', 2)

            ->where('arbcase.arbid', $user)
            ->get();
            return $data;

}


}
