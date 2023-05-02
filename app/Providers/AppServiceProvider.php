<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }

    public function jumlahpelaksanaanpendidikanbykumid()
    {
        // ...
        $result = DB::table('kums')
            ->join('pelaksanaan_pendidikans', 'kums.id', '=', 'pelaksanaan_pendidikans.kum_id')
            ->select('kums.id', DB::raw('SUM(pelaksanaan_pendidikans.jumlah_angka_kredit) as total_ak'))
            ->groupBy('id', 'judul')
            ->where('id_user', auth()->user()->id)
            ->get();
        app()->instance('global_result', $result);
    }                                                                                           

}
