<?php

namespace App\Providers;
use App\Models\Menu;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Submenu;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        Paginator::useBootstrap();

        view()->composer('*', function ($view) {


            // $usuarios_submenus =DB::table('roles_usuarios as A')
            // ->join('rol_menus as B','A.rol_id', '=', 'B.rol_id')
            // ->select(
            //      'A.rol_id', 'B.submenu_id', 'A.user_id'
            // )
            // ->where('A.user_id','=', Auth::user()->id)
            // ->get();



            $menus = Menu::all();
            $id = 80;
            $gbl_menus = Menu::find($id);
            $gbl_submenus = Submenu::where('menu_id','=',$gbl_menus->id)->get();
            $view->with(['gbl_menus'=>$gbl_menus,'gbl_submenus'=>$gbl_submenus,'menus'=>$menus]);
        });
    }
}
