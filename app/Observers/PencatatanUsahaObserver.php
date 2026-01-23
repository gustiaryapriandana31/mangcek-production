<?php

namespace App\Observers;

use App\Models\PencatatanUsaha;
use Illuminate\Support\Facades\File;

class PencatatanUsahaObserver
{
    /**
     * Handle the PencatatanUsaha "created" event.
     */
    public function saved(PencatatanUsaha $pencatatanUsaha)
    {
        // dd($_SERVER['DOCUMENT_ROOT']); 
        // /home/u237616147/domains/bpsoganilir.com/public_html/mangcek
        
        
        if (!$pencatatanUsaha->photo_path) return;

        // SOURCE (backend storage)
        $source = storage_path('app/public/' . $pencatatanUsaha->photo_path);

        // DESTINATION (public_html)
        $publicRoot = $_SERVER['DOCUMENT_ROOT'] . '/storage';
        $dest = $publicRoot . '/' .$pencatatanUsaha->photo_path;

        if (file_exists($source)) {
            File::ensureDirectoryExists(dirname($dest));
            File::copy($source, $dest);
        }
    }
    
    // public function created(PencatatanUsaha $pencatatanUsaha) : void
    // {
    //     if (!$pencatatanUsaha->photo_path) return;

    //     $source = storage_path('app/public/' . $pencatatanUsaha->photo_path);
    //     $dest   = public_path($pencatatanUsaha->photo_path);

    //     if (file_exists($source) && !file_exists($dest)) {
    //         File::ensureDirectoryExists(dirname($dest));
    //         File::copy($source, $dest);
    //     }
    // }

    // /**
    //  * Handle the PencatatanUsaha "updated" event.
    //  */
    // public function updated(PencatatanUsaha $pencatatanUsaha): void
    // {
    //     if (!$pencatatanUsaha->photo_path) return;

    //     $source = storage_path('app/public/' . $pencatatanUsaha>photo_path);
    //     $dest   = public_path($pencatatanUsaha->photo_path);

    //     if (file_exists($source) && !file_exists($dest)) {
    //         File::ensureDirectoryExists(dirname($dest));
    //         File::copy($source, $dest);
    //     }
    // }

    /**
     * Handle the PencatatanUsaha "deleted" event.
     */
    public function deleted(PencatatanUsaha $pencatatanUsaha): void
    {
        //
    }

    /**
     * Handle the PencatatanUsaha "restored" event.
     */
    public function restored(PencatatanUsaha $pencatatanUsaha): void
    {
        //
    }

    /**
     * Handle the PencatatanUsaha "force deleted" event.
     */
    public function forceDeleted(PencatatanUsaha $pencatatanUsaha): void
    {
        //
    }
}
