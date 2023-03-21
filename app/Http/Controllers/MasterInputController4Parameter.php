<?php

namespace App\Http\Controllers;

use App\Models\MasterInput4Parameter;
use Illuminate\Http\Request;

class MasterInputController4Parameter extends Controller
{
    
   public function index(Request $request)
   {
    
    try {
        if($request->par != null)
        {
            $dataedit = MasterInput4Parameter::find(Dec($request->par));
        }   
        else
        {
            $dataedit = (object)[
                "tahun" => "",
                "pasien_id" => "",
                "pasien" => "",
                "bpjs" => "",
                "tunai" => "",
                "kredit" => ""
            ];
        }

        $datastatus = MasterInput4Parameter::orderBy('id', 'ASC')->get();
        return view('pages.admin.master-input-4-parameter', [
            "data_status" => $datastatus,
            "data_edit" => $dataedit,
            "data_tahun" => DaftarTahun(),
        ]);
    } catch (\Exception $e) {
        return redirect()->route('error')->with('message', $e->getMessage())->with('color-alert', "danger");
    }
   }
   
   public function process(Request $request)
   {
    try {

        MasterInput4Parameter::create($request->all());
        return redirect()->route('adm-master-input-4-par')->with('message', "Data Berhasil di tambah")->with('color-alert', "success");

    } catch (\Exception $e) {
        
        return redirect()->route('error')->with('message', $e->getMessage())->with('color-alert', "danger");
    }
   }
   public function update(Request $request, $id)
   {
    try {
        $update = MasterInput4Parameter::find(Dec($id));
        $update->update($request->all());
        return redirect()->route('adm-master-input-4-par')->with('message', "Data Berhasil di Update")->with('color-alert', "success");

    } catch (\Exception $e) {
        return redirect()->route('error')->with('message', $e->getMessage())->with('color-alert', "danger");
    }
   }
   public function delete(Request $request)
   {   
       try {
           $delete = MasterInput4Parameter::find(Dec($request->delete_menu));
           //hapus di menu
           $delete->delete();
           return redirect()->route('adm-master-input-4-par')->with('message', "Data Berhasil di Hapus")->with('color-alert', "success");

       } catch (\Exception $e) {
           return back()->with('message', $e->getMessage())->with('color-alert', "danger");
       }
   }

   public function caritarget(Request $request)
   {
    try {
        $data_target = MasterInput4Parameter::where('pasien_id', $request->paramid)
                                            ->where('tahun',$request->paramtahun)->first();
        return $data_target;

    } catch (\Exception $e) {
        return back()->with('message', $e->getMessage())->with('color-alert', "danger");
    }
   }
}
