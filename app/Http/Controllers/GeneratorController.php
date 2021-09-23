<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class GeneratorController extends Controller
{

    public function download(Request $request)
    {
        $formData = $request->input();
        // TODO: Validate incoming input
        $pdf = PDF::loadView('pdf.cv', ['data'=>$formData]);
        $stream = $pdf->stream('cv.pdf');
        file_put_contents("cv.pdf", $stream);
    }

}
