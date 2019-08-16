<?php

namespace Canvas\Http\Controllers;

use Illuminate\Routing\Controller;

class LangController extends Controller
{
    /**
     * Gather all the language files and rebuild them into into a single
     * consumable JSON object that can be set in the window header.
     *
     * @return void
     */
    public function __invoke(): void
    {
        $files = glob(dirname(__DIR__, 3).'/resources/lang/'.config('app.locale').'/*.php');
        $lines = collect();

        foreach ($files as $file) {
            $filename = basename($file, '.php');
            $lines->put($filename, require $file);
        }

        header('Content-Type: text/javascript');
        echo 'window.i18n = '.json_encode($lines->toArray()).';';

        die();
    }
}
