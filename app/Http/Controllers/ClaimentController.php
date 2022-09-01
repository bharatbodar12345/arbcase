<?php

namespace App\Http\Controllers;

use App\Models\Arbcase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ClaimentController extends Controller
{
    public function climeat($id) {
        // dd($id);
    $user = Auth::user()->id;
    // dd($user);
    $data= Arbcase::select('arbcase.*', 'cli.name as cliname', 'arb.name as Arbname',  
    'joincode.name as Name', 'joincode.userEmail as Email','joincode.userPhone as Phone', 'joincode.username as Username', 
    'ext.soc_doc as socdoc', 'ext.socc_doc as soccdoc', 'ext.sod_doc as soddoc', 'ext.res_doc as resdoc',
    'arbdate.date as Date','arbdate.filename as Filename', 'arbdate.additional_document as Additional Document', 'arbdate.direction_name as Direction Name', 'arbdate.resone as Resone',
    'award.award as Award', 'closedaward.award as ClosedAward')

            ->leftJoin('user as cli', 'arbcase.user1', '=', 'cli.id')
            ->leftJoin('user as arb', 'arb.id', '=' ,'arbcase.arbid')
            ->leftJoin('arbcase as award', 'award.id', '=' ,'arbcase.arbid')
            ->leftJoin('closed_award as closedaward', 'closedaward.caseid', '=' ,'arbcase.arbid')
            ->leftJoin('arbcase_ext as ext', 'arbcase.id', '=' ,'ext.case_id')
            ->leftJoin('user_involved_in_agreement_arb as joincode', 'joincode.id', '=' ,'arbcase.user2d')
            ->leftJoin('arbitration_date as arbdate', 'arbcase.id',  '=' ,'arbdate.case_id')
                        
            ->where('arbcase.arbid', $user)
            ->where('arbcase.id', $id)

            ->get();
            return $data;
    }

    public function relationdata($id)
    {
        $user = Auth::user()->id;
        // dd($id);
        $relationdata =  Arbcase::with(['arbuser1', 'userid','arbcase_ext','closed_award','arbcasetable','arbitration_date',
        'user_involved_in_agreement_arb'])->where('arbcase.id', $id)->where('arbcase.id', $id)->get();
        // dd($relationdata);

        return $relationdata;

    }
}
