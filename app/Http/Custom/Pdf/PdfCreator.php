<?php

namespace App\Http\Custom\Pdf;

use PDF;

/** create pdf file */
class PdfCreator
{
    /**
     * create pdf file
     *
     * @param string $path
     * @param string $filename
     * @param string $pdf_view
     * @param array $parameters
     * @return string
     */
    public static function CreatePdfFile($path, $filename, $pdf_view, $parameters)
    {
        $storage_name = $path . '/' . $filename;
        $fullname = base_path('storage/app/public/' . $path . '/' . $filename);

        $pdf = PDF::loadView($pdf_view, ['parameters' => $parameters, 'key' => 0]);
        $pdf->save($fullname);

        return $storage_name;
    }
}
