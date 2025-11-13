<?php

namespace App\Http\Controllers;

use App\Models\Profile\HistoryTimeline;
use App\Models\Profile\LogoMeaning;
use App\Models\Profile\Minister;
use App\Models\Profile\Official;
use App\Models\Profile\OrganizationStructure;
use App\Models\Profile\VisionMission;
use App\Models\Profile\ContactLocation;
use App\Models\Profile\TaskFunctions;

class ProfileController extends Controller
{
    public function sejarah()
    {
        $timelines = HistoryTimeline::orderBy('year')->get();
        return view('components.public.pages.profile.sejarah', compact('timelines'));
    }

    public function visiMisi()
    {
        $visionMission = VisionMission::first();
        return view('components.public.pages.profile.visi-misi', compact('visionMission'));
    }

    public function strukturOrganisasi()
    {
        $organizationStructure = OrganizationStructure::first();
        return view('components.public.pages.profile.struktur-organisasi', compact('organizationStructure'));
    }

    public function maknaLogo()
    {
        $logoMeaning = LogoMeaning::first();
        return view('components.public.pages.profile.makna-logo', compact('logoMeaning'));
    }
    
    public function daftarMenteri()
    {
        $featuredMinister = Minister::orderBy('order_number', 'desc')->first();
        $ministers = $ministers = Minister::orderBy('order_number', 'desc')->offset(1)->limit(100)->get();
        return view('components.public.pages.profile.daftar-menteri', compact('featuredMinister', 'ministers'));
    }

    public function daftarPejabat()
    {
        $menteriOfficials = Official::where('position_type', 'Menteri')->get();
        $wakilMenteriOfficials = Official::where('position_type', 'Wakil Menteri')->get();
        $pejabatOfficials = Official::where('position_type', 'Pejabat')->orderBy('sort_order')->get();

        return view(
            'components.public.pages.profile.daftar-pejabat',
            compact('menteriOfficials', 'wakilMenteriOfficials', 'pejabatOfficials')
        );
    }

    public function lokasiKontak()
    {
        $contacts = ContactLocation::orderBy('institution_name')->get();

        $id = request('id');
        $active = null;

        if ($contacts->isNotEmpty()) {
            if (!empty($id)) {
                $active = $contacts->firstWhere('id', (int) $id);
            }
            if (!$active) {
                $active = $contacts->first();
            }
        }

        return view('components.public.pages.profile.lokasi-kontak', compact('contacts', 'active'));
    }

    public function taskFunctions()
    {
        $taskFunctions = taskFunctions::orderBy('order_column')
            ->orderBy('institution_name')
            ->get();

        $id = request('id');
        $active = null;

        if ($taskFunctions->isNotEmpty()) {
            if (!empty($id)) {
                $active = $taskFunctions->firstWhere('id', (int) $id);
            }
            if (!$active) {
                $active = $taskFunctions->first();
            }
        }

        return view('components.public.pages.profile.tugas-fungsi', compact('taskFunctions', 'active'));
    }
}