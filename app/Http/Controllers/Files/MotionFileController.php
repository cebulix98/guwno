<?php

namespace App\Http\Controllers\Files;

use App\Http\Controllers\Controller;
use App\Http\Custom\Parameters;
use App\Http\Custom\Pdf\PdfMotion;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PhpOffice\PhpWord\Settings;
use Dompdf\Dompdf;

class MotionFileController extends Controller
{
    /**
     * view name
     */
    public const VIEW = 'rtf/motions/rtf_motion_1';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $source = "helloWorld.rtf";

        $html = file_get_contents("test.html");

        // $dompdf = new Dompdf();
        // $dompdf->loadHtml($html, 'UTF-8');
        // $dompdf->render();
        // $dompdf->stream();

        $mpdf = new \Mpdf\Mpdf();

        // Write some HTML code:
        $mpdf->WriteHTML($html);

        // Output a PDF file directly to the browser
        $mpdf->Output();


        //  $phpWord = \PhpOffice\PhpWord\IOFactory::load($source);

        // //  $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'PDF');
        // //  $objWriter->save('test.html');
        // mb_internal_encoding("UTF-8");
        // Settings::setPdfRendererName(Settings::PDF_RENDERER_DOMPDF);
        // Settings::setPdfRendererPath('.');
        // $phpWord->save('test.pdf', 'PDF');



        //return view($this::VIEW, ['parameters' => $parameters, 'key' => 0]);
    }

    public function SaveRtf()
    {
        $handler = new PdfMotion(1, 1);
        $parameters = $handler->PrepareParameters();

        $output = view($this::VIEW)
            ->with(['parameters' => $parameters, 'key' => 0])
            ->render();

        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $section = $phpWord->addSection();
        $footer = $section->addFooter();
        $footer->addPreserveText('Strona {PAGE} / {NUMPAGES}.');

        \PhpOffice\PhpWord\Shared\Html::addHtml($section, $output, true, true);

        $path = Parameters::PATH_PDF_MOTION;
        $filename = 'motion_' . '1' . Carbon::now()->toDateString()  . '.rtf';

        $path = storage_path('app/public/' . $path . '/' . $filename);

        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save($path);
    }
}
