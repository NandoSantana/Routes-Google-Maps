<?php

namespace App\Http\Controllers;

use App\Info;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class RoutesController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Info::latest()->get();
            return DataTables::of($data)
                    ->addIndexColumn()
                    // ->addColumn('action', function($row){
   
                    //        $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';
     
                    //         return $btn;
                    // })
                    // ->rawColumns(['action'])
                    ->make(true);
        }
      
        return view('routesTables');
    }
}
