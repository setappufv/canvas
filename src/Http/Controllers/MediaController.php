<?php

namespace Canvas\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    /**
     * Process an image upload.
     *
     * @return string
     */
    public function __invoke(): string
    {
        $path = request()->image->store(sprintf('%s/%s', config('canvas.storage_path'), 'images'), [
            'disk'       => config('canvas.storage_disk'),
            'visibility' => 'public',
        ]);

        return Storage::disk(config('canvas.storage_disk'))->url($path);
    }
}
