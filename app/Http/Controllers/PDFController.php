<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\Snappy\Facades\SnappyPdf;

class PDFController extends Controller
{
    public function generatePDF(Request $request)
    {
        $image = $request->input('image');

        // Decode the base64 image
        $imageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $image));

        // Save the image temporarily
        $imagePath = storage_path('app/public/screenshot.png');
        file_put_contents($imagePath, $imageData);

        // Create a PDF containing the image
        $html = '<html><body><img src="' . $imagePath . '" style="width: 100%;"></body></html>';
        $pdf = SnappyPdf::loadHTML($html);

        // Return the PDF file as a response
        return response($pdf->output(), 200)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'attachment; filename="screen.pdf"');
    }
}
