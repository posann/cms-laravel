<?php

namespace App\Http\Controllers;

use App\Models\Permit\ServiceStandard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ServiceStandardController extends Controller
{

    public function index()
    {
        $doc = ServiceStandard::first();

        if (! $doc) {
            $doc = ServiceStandard::create([
                'title' => '',
                'description' => '',
                'pdf_path' => null,
            ]);
        }

        // Derived variables for the Blade view (avoid undefined variable errors)
        $title = $doc->title ?? '';
        $description = $doc->description ?? '';
        $hasPdf = ! empty($doc->pdf_path);

        // Check route existence (Blade expects these flags)
        $streamRouteExists = \Route::has('service-standard.stream');
        $downloadRouteExists = \Route::has('service-standard.download');

        return view(
            'components.public.pages.permit.service-standard',
            compact(
                'doc',
                'title',
                'description',
                'hasPdf',
                'streamRouteExists',
                'downloadRouteExists'
            )
        );
    }

    public function streamPdf()
    {
        $doc = ServiceStandard::firstOrFail();

        if (! $doc->pdf_path) {
            abort(404, 'PDF not found.');
        }

        $publicPath = storage_path('app/public/' . $doc->pdf_path);
        if ($doc->pdf_path && file_exists($publicPath)) {
            return response()->file($publicPath);
        }

        if (Storage::exists($doc->pdf_path)) {

            $tempPath = Storage::path($doc->pdf_path);
            if (file_exists($tempPath)) {
                return response()->file($tempPath);
            }
        }

        abort(404, 'PDF not found.');
    }

    public function downloadPdf()
    {
        $doc = ServiceStandard::firstOrFail();

        if (! $doc->pdf_path) {
            abort(404);
        }
        $publicPath = storage_path('app/public/' . $doc->pdf_path);
        if (file_exists($publicPath)) {
            return response()->download($publicPath, basename($doc->pdf_path));
        }

        if (Storage::exists($doc->pdf_path)) {
            return Storage::download($doc->pdf_path);
        }

        abort(404);
    }
}
