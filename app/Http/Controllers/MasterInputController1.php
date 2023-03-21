<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriInput;
use App\Models\MasterInput1;

class MasterInputController1 extends Controller
{

  public function index(Request $request)
  {
    try{

      $query_master = MasterInput1::where('tahun', '!=','');

      if($request->tahun !='')
      {
        $query_master->where('tahun', $request->tahun);
      }
      if($request->txt_cari !='')
      {
        $query_master->where('keterangan','like','%'. $request->txt_cari .'%');
      }

      $data = $query_master->paginate(30);

      return view('pages.admin.master-input-1',[
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

        $datakategori = KategoriInput::where('input','input_1')->get();
        
        return view('pages.admin.master-input-1-add', [
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
      
      MasterInput1::create($payload);
      return redirect()->route('adm-master-input-1')->with('message', "Data Berhasil di update")->with('color-alert', "success");
    } 
    catch (\Exception $e) 
    {
      return redirect()->route('error')->with('message', $e->getMessage())->with('color-alert', "danger");
    }
  
  }

  public function edit(Request $request, $id)
  {
    try {
        $datakategori = KategoriInput::where('input','input_1')->get();
        $dataedit = MasterInput1::find(Dec($id));
        
        return view('pages.admin.master-input-1-edit', [
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
      $update = MasterInput1::find(Dec($id));
      $update->update($request->all());
      
      return redirect()->route('adm-master-input-1')->with('message', "Data Berhasil di update")->with('color-alert', "success");
    } 
    catch (\Exception $e) 
    {
      return redirect()->route('error')->with('message', $e->getMessage())->with('color-alert', "danger");
    }

  }

  public function delete(Request $request)
  {
      try {
          $delete = MasterInput1::find(Dec($request->delete_menu));
          $delete->delete();
          return redirect()->back()->with('message', "Data Berhasil di Hapus")->with('color-alert', "success");

      } catch (\Exception $e) {
          return back()->with('message', $e->getMessage())->with('color-alert', "danger");
      }
  }



}
