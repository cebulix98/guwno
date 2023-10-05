<?php

namespace App\Http\Managers;

use Carbon\Carbon;

//complex static classes
class FileManager
{

    /**
     * create rtf document from html
     *
     * @param string $content
     * @param string $filename
     * @return void
     */
    public static function CreateDocumentHtmlToRtf($content, $filename)
    {

        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $section = $phpWord->addSection();
        $footer = $section->addFooter();
        $footer->addPreserveText('Strona {PAGE} / {NUMPAGES}.');
        $footer->addText(Carbon::now()->toDateString());

        \PhpOffice\PhpWord\Shared\Html::addHtml($section, $content, true, false);

        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save($filename);
    }

        /**
     * create rtf document from html
     *
     * @param string $content
     * @param string $filename
     * @return void
     */
    public static function CreateDocumentHtmlToTxt($content, $filename)
    {

        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $section = $phpWord->addSection();
        $footer = $section->addFooter();
        $footer->addPreserveText('Strona {PAGE} / {NUMPAGES}.');
        $footer->addText(Carbon::now()->toDateString());

        \PhpOffice\PhpWord\Shared\Html::addHtml($section, $content, true, false);

        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'ODText');
        $objWriter->save($filename);
    }

    /**
     * get html output from blade
     *
     * @param string $view
     * @param array $parameters
     * @return string
     */
    public static function GetBladeOutput($view, $parameters)
    {
        $output = view($view)
            ->with($parameters)
            ->render();

        return $output;
    }

    /**
     * save rtf file to html file
     *
     * @param string $rtf path to rtf
     * @param string $output_filename path to html
     * @return string
     */
    public static function SaveRtfToHtml($rtf, $output_filename)
    {
        $phpWord = \PhpOffice\PhpWord\IOFactory::load($rtf);

        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'HTML');
        $objWriter->save($output_filename);

        return $output_filename;
    }

    /**
     * save html file to pdf
     *
     * @param string $file_html path to html
     * @param string $output_filename path to html
     * @return string
     */
    public static function SaveHtmlToPdf($file_html, $output_filename)
    {
        $html = file_get_contents($file_html);

        $mpdf = new \Mpdf\Mpdf();

        $mpdf->WriteHTML($html);

        $mpdf->Output($output_filename, \Mpdf\Output\Destination::FILE);

        return $output_filename;
    }
}
