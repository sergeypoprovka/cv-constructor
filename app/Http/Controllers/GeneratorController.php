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
        $pdf->save('cv.pdf');
    }

}
