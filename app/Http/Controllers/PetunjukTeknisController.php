<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\PetunjukTeknis;

class PetunjukTeknisController extends Controller
{
    public function index(Request $request)
    {
        try{
            $datalist = PetunjukTeknis::get();
            
            return view('pages.admin.petunjuk-teknis',[
                "data_list" => $datalist
            ]); 
        } catch (\Exception $e) {
            return redirect()->route('error')->with('message', $e->getMessage())->with('color-alert', "danger");
        }
    }

    public function add(Request $request)
    {
        try{
            $datalist = Menu::where('route_parent','!=','')->get();
            
            return view('pages.admin.petunjuk-teknis-add',[
                "data_list" => $datalist
            ]); 
        } catch (\Exception $e) {
            return redirect()->route('error')->with('message', $e->getMessage())->with('color-alert', "danger");
        }
    }

    public function process(Request $request)
    {
        try{
           $payload = [
            "input" => $request->input,
            "keterangan" => $request->keterangan,
           ];

           
           PetunjukTeknis::create($payload);
           return redirect()->back()->with('message', "Data Telah disimpan")->with('color-alert', "success");
        } catch (\Exception $e) {
            return redirect()->route('error')->with('message', $e->getMessage())->with('color-alert', "danger");
        }
    }
    public function edit(Request $request, $id)
    {
        try {
            $dataedit = PetunjukTeknis::find(Dec($id));
            $datalist = Menu::where('route_parent','!=','')->get();
            return view('pages.admin.petunjuk-teknis-edit',[
                "data_petunjuk_edit" => $dataedit,
                "data_list" => $datalist
            ]);

        } catch (\Exception $e) {
            return back()->with('message', $e->getMessage())->with('color-alert', "danger");
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $update = PetunjukTeknis::find(Dec($id));
            $payload = [
                "input" => $request->input,
                "keterangan" => $request->keterangan,
            ];
            $update->update($payload);
            return redirect()->back()->with('message', "Data Telah diUbah")->with('color-alert', "success");

        } catch (\Exception $e) {
            return back()->with('message', $e->getMessage())->with('color-alert', "danger");
        }
    }

    
    public function delete(Request $request)
    {
        try {
            $delete = PetunjukTeknis::find(Dec($request->delete_menu));
            //hapus juga di role menu
           
            $delete->delete();
            return redirect()->back()->with('message', "Data Berhasil di Hapus")->with('color-alert', "success");


        } catch (\Exception $e) {
            return back()->with('message', $e->getMessage())->with('color-alert', "danger");
        }
    }
}
