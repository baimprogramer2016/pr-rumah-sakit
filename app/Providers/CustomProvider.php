<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Menu;
use App\Models\Icon;


class CustomProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //menu admin setting
        View::composer('*', function ($view) {
         
            $menuadminsetting = Menu::get();
          
            $view->with('menuadminsetting', $menuadminsetting);            
    
        });
        View::composer('*', function ($view) {
         
            $menuusersetting = Menu::join('role_menu', 'menu.route','=','role_menu.route')
                                    ->where('menu.route_category','!=','superadmin')
                                    ->where('menu.route_category','admin')
                                    ->get(['menu.*','role_menu.role']);
          
            $view->with('menuusersetting', $menuusersetting);            
    
        });
        View::composer('*', function ($view) {
         
            $menuusersetting2 = Menu::join('role_menu', 'menu.route','=','role_menu.route')
                                    ->where('menu.route_category','!=','superadmin')
                                    ->where('menu.route_category','general')
                                    ->get(['menu.*','role_menu.role']);
          
            $view->with('menuusersetting2', $menuusersetting2);            
    
        });

        //menu admin setting
        View::composer('*', function ($view) {

                $icon = Icon::first();
            
                $view->with('iconlogo', $icon);            
        
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
