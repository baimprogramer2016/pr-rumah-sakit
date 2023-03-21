<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StatusPerformance;

class SettingStatusPerformanceController extends Controller
{
   public function index(Request $request)
   {
    
    try {
        if($request->par != null)
        {
            $dataedit = StatusPerformance::find(Dec($request->par));
        }   
        else
        {
            $dataedit = (object)[
                "kode" => "",
                "keterangan" => ""
            ];
        }

        $datastatus = StatusPerformance::orderBy('id', 'ASC')->get();
        return view('pages.admin.setting-status-performance', [
            "data_status" => $datastatus,
            "data_edit" => $dataedit
        ]);
    } catch (\Exception $e) {
        return redirect()->route('error')->with('message', $e->getMessage())->with('color-alert', "danger");
    }
   }


   public function process(Request $request)
   {
    try {
        StatusPerformance::create($request->all());
        return redirect()->route('setting-status-performance')->with('message', "Data Berhasil di tambah")->with('color-alert', "success");

    } catch (\Exception $e) {
        return redirect()->route('error')->with('message', $e->getMessage())->with('color-alert', "danger");
    }
   }
   public function update(Request $request, $id)
   {
    try {
        $update = StatusPerformance::find(Dec($id));
        $update->update($request->all());
        return redirect()->route('setting-status-performance')->with('message', "Data Berhasil di Update")->with('color-alert', "success");

    } catch (\Exception $e) {
        return redirect()->route('error')->with('message', $e->getMessage())->with('color-alert', "danger");
    }
   }
   public function delete(Request $request)
   {   
       try {
           $delete = StatusPerformance::find(Dec($request->delete_menu));
           //hapus di menu
           $delete->delete();
           return redirect()->route('setting-status-performance')->with('message', "Data Berhasil di Hapus")->with('color-alert', "success");

       } catch (\Exception $e) {
           return back()->with('message', $e->getMessage())->with('color-alert', "danger");
       }
   }

}