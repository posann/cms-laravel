<?php

namespace App\Http\Controllers;

class ProfileController extends Controller
{
    public function sejarah()
    {
        return view('components.public.pages.profile.sejarah');
    }

    public function visiMisi()
    {
        return view('components.public.pages.profile.visi-misi');
    }

    public function strukturOrganisasi()
    {
        return view('components.public.pages.profile.struktur-organisasi');
    }

    public function maknaLogo()
    {
        return view('components.public.pages.profile.makna-logo');
    }
    
    public function daftarMenteri()
    {
        return view('components.public.pages.profile.daftar-menteri');
    }

    public function daftarPejabat()
    {
        return view('components.public.pages.profile.daftar-pejabat');
    }

    
}