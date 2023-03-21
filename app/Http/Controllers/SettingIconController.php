<?php

namespace App\Http\Controllers;

use App\Models\Icon;
use Illuminate\Http\Request;

class SettingIconController extends Controller
{
    public function index(Request $request)
    {
        try{
            $data = Icon::first();
            
            if($data == null)
            {
                $dataicon = (object)[
                    "app_name" => '',
                    "icon" => 'no-image.png',
                    "favicon" => 'no-image.png',
                ];
            }
            else
            {
                $dataicon = (object)[
                    "app_name" => ($data->app_name == '') ?'' : $data->app_name,
                    "icon" => ($data->icon == '') ?'no-image.png' : $data->icon,
                    "favicon" => ($data->favicon == '') ?'no-image.png' : $data->favicon,
                ];
            }
            
            return view('pages.admin.setting-icon',[
                "data_icon" => $dataicon
            ]);
        }catch(\Exception $e)
        {
            // view('pages.admin.setting-icon',[
            //     "data_icon" => $dataicon
            // ]);
            return redirect()->route('error')->with('message',$e->getMessage())->with('color-alert',"danger");
        }
    }

    public function process(Request $request)
    {
        try{
            
            $data = Icon::first();
            if($data == null) //jika kosong insert
            {
                if($request->icon)
                {
                    $imageIconName      = 'icon_'.time().'.'.$request->icon->extension();
                    $icon_type          = $request->icon->extension();
                    if(!checkType($icon_type))
                    {
                        return redirect()->route('setting-icon')->with('message','Tipe File tidak sesuai, jpg,png,jpeg,ico')->with('color-alert','danger');    
                    }
                    else
                    {
                        $request->icon->move(public_path('uploads/icons'), $imageIconName);
                    }
                }
                else
                {
                    $imageIconName      = '';
                }

                if($request->favicon)
                {
                    $favicon_type   = $request->favicon->extension();
                    $imageFaviconName   = 'favicon_'.time().'.'.$request->favicon->extension(); 
                    if($data)
                    if(!checkType($favicon_type))
                    {
                        return redirect()->route('setting-icon')->with('message','Tipe File tidak sesuai, jpg,png,jpeg,ico')->with('color-alert','danger');    
                    }
                    else
                    {
                        $request->favicon->move(public_path('uploads/icons'), $imageFaviconName);
                    }
                }
                else
                {
                    $imageFaviconName      = '';
                }
                
                $payload = [
                    "app_name" => $request->app_name,
                    "icon" => $imageIconName,
                    "favicon" => $imageFaviconName,
                ];
                Icon::create($payload);
            }
            else //update
            {
                if($request->icon)
                {
                    $icon_type          = $request->icon->extension();
                    if(!checkType($icon_type))
                    {
                        return redirect()->route('setting-icon')->with('message','Tipe File tidak sesuai, jpg,png,jpeg,ico')->with('color-alert','danger');    
                    }
                    else
                    {
                        $imageIconName      = 'icon_'.time().'.'.$request->icon->extension();
                        if($data->icon != '')
                        {
                            $imageIconName      = $data->icon;
                        }
        
                        $request->icon->move(public_path('uploads/icons'), $imageIconName);
                    }
                }
                else
                {
                    $imageIconName      = '';
                    if($data->icon != '')
                    {
                        $imageIconName      = $data->icon;
                    }
                }
         
                if($request->favicon)
                {
                    $icon_type          = $request->favicon->extension();
                    if(!checkType($icon_type))
                    {
                        return redirect()->route('setting-icon')->with('message','Tipe File tidak sesuai, jpg,png,jpeg,ico')->with('color-alert','danger');    
                    }
                    else
                    {
                        $imageFaviconName      = 'icon_'.time().'.'.$request->favicon->extension();
                        if($data->favicon != '')
                        {
                            $imageFaviconName      = $data->favicon;
                        }
        
                        $request->favicon->move(public_path('uploads/icons'), $imageFaviconName);
                    }
                }
                else
                {
                    $imageFaviconName      = '';
                    if($data->favicon != '')
                    {
                        $imageFaviconName      = $data->favicon;
                    }
                }
              
                $update = Icon::find($data->id);
                $payload = [
                    "app_name" => $request->app_name,
                    "icon" => $imageIconName,
                    "favicon" => $imageFaviconName,
                ];

                $update->update($payload);
            }

            return back()->with('message','Pengaturan berhasil di Update')->with('color-alert',"success");;  
        }catch(\Exception $e)
        {
            return back()->with('message',$e->getMessage())->with('color-alert',"danger");
        }
         
    }
}
