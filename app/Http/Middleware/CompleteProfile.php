<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CompleteProfile
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::user();
        //$user = User::findOrFail(Auth::id());
        // Periksa apakah data profil lengkap
        if ($user && (!$user->NIDN || !$user->tanggal_lahir || !$user->tempat_lahir || !$user->ikatan_kerja || !$user->jabatan_fungsional || !$user->institusi || !$user->fakultas || !$user->pangkat )) {
            return redirect()->route('/ubahprofil/{id}'); // Ganti 'complete-profile' dengan rute halaman lengkapi data profil
        }

        return $next($request);
    }
}
