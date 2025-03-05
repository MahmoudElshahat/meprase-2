<?php

namespace Theme\Apexa\Http\Controllers;

use Botble\Theme\Http\Controllers\PublicController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;

class ApexaController extends PublicController
{
    public function getIndex()
    {
        return parent::getIndex();
    }

    public function getView(?string $key = null, string $prefix = '')
    {
        return parent::getView($key);
    }

    public function getSiteMapIndex(string $key = null, string $extension = 'xml')
    {
        return parent::getSiteMapIndex();
    }

    public function downloadFile(Request $request)
    {
        $this->validate($request, [
            'filePath' => ['string', 'required'],
        ]);

        $path = $request->input('filePath');

        if (! File::exists(public_path('storage/' . $path))) {
            abort(404);
        }

        return Response::download(public_path('storage/' . $path));
    }
}
