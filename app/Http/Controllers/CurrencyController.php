<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Currency;
use DataTables;

class CurrencyController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

         /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Currency::select('*');
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                       $st = $row->status===0?'checked disabled':'';
                           $btn = '<div class="form-check form-switch">
                                      <input class="form-check-input status-switch" type="checkbox" role="switch"  value="'.$row->status.'" '.$st.' onclick="changestatus('.$row->id.', '.$row->status.')">
                                      
                                    </div>';
    
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        
        return view('admin.currency-list');
    }
    
     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = Currency::find($request->id);
        // dd($data->id);
        $status = $request->status == 1?2:1;
        Currency::where('status', 2)->update(['status' => 1]);
        $res = Currency::where('id', $data->id)->update(['status' => $status]);
        
        return \Response::json(['message' => 'Currency successfully updated!', 'status' => true], 200);
    }
 }

