<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MasterInput2;
use App\Models\KategoriInput;

class MasterInputController2 extends Controller
{
    

  public function index(Request $request)
  {
    try{

      $query_master = MasterInput2::where('tahun', '!=','');

      if($request->tahun !='')
      {
        $query_master->where('tahun', $request->tahun);
      }
      if($request->txt_cari !='')
      {
        $query_master->where('key_performance','like','%'. $request->txt_cari .'%');
      }

      $data = $query_master->paginate(30);

      return view('pages.admin.master-input-2',[
        "datamasterinput" => $data,
        "data_tahun" => DaftarTahun(),
        "txt_cari" => $request->txt_cari
      ]);

    } catch (\Exception $e) {
      return redirect()->route('error')->with('message', $e->getMessage())->with('color-alert', "danger");
    }
  }
  public function add(Request $request)
  {
    try {

        $datakategori = KategoriInput::where('input','input_2')->get();
        
        return view('pages.admin.master-input-2-add', [
           "data_kategori" => $datakategori,
           "data_tahun" => DaftarTahun(),
        ]);
    } catch (\Exception $e) {
        return redirect()->route('error')->with('message', $e->getMessage())->with('color-alert', "danger");
    }
  }

  public function process(Request $request)
  {
    try 
    {
      $payload = $request->all();
      $payload['kode'] = rand(0000,9999);
      
      MasterInput2::create($payload);
      return redirect()->route('adm-master-input-2')->with('message', "Data Berhasil di update")->with('color-alert', "success");
    } 
    catch (\Exception $e) 
    {
      return redirect()->route('error')->with('message', $e->getMessage())->with('color-alert', "danger");
    }
  
  }

  public function edit(Request $request, $id)
  {
    try {
        $datakategori = KategoriInput::where('input','input_2')->get();
        $dataedit = MasterInput2::find(Dec($id));
        
        return view('pages.admin.master-input-2-edit', [
           "data_kategori" => $datakategori,
           "data_tahun" => DaftarTahun(),
           "data_edit" => $dataedit
        ]);
    } catch (\Exception $e) {
        return redirect()->route('error')->with('message', $e->getMessage())->with('color-alert', "danger");
    }
  }

  
  public function update(Request $request, $id)
  {
    try 
    {
      $update = MasterInput2::find(Dec($id));
      $update->update($request->all());
      
      return redirect()->route('adm-master-input-2')->with('message', "Data Berhasil di update")->with('color-alert', "success");
    } 
    catch (\Exception $e) 
    {
      return redirect()->route('error')->with('message', $e->getMessage())->with('color-alert', "danger");
    }

  }

  public function delete(Request $request)
  {
      try {
          $delete = MasterInput2::find(Dec($request->delete_menu));
          $delete->delete();
          return redirect()->back()->with('message', "Data Berhasil di Hapus")->with('color-alert', "success");

      } catch (\Exception $e) {
          return back()->with('message', $e->getMessage())->with('color-alert', "danger");
      }
  }
}
