<?php

namespace App\Models\Cases;

use App\Http\Creators\CaseCreator;
use App\Http\Creators\FileCreator;
use App\Http\Custom\Parameters;
use App\Http\Custom\Pdf\PdfCreator;
use App\Http\Custom\Pdf\PdfMotion;
use App\Http\Enumerators\Cases\CaseEventEnum;
use App\Http\Managers\FileManager;
use App\Models\File\FileAsset;
use App\Models\File\FileAssetDirectory;
use App\Models\Motion\Motion;
use Carbon\Carbon;
use Facade\FlareClient\Stacktrace\File;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Log;

class CaseMotion extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'case_id', 'code', 'rtf_id', 'pdf_id', 'original_rtf_id', 'original_pdf_id', 'txt_id', 'original_txt_id'
    ];

    public const PDF_PREFIX_NAME = "motion_";
    public const PATH_DIRECTORY_ID = 9;

    /**
     * relation: case
     *
     * @return CaseCase
     */
    public function case()
    {
        return $this->hasOne(CaseCase::class, 'id', 'case_id');
    }

    /**
     * relation: file
     *
     * @return FileAsset
     */
    public function rtf()
    {
        return $this->hasOne(FileAsset::class, 'id', 'rtf_id');
    }

    /**
     * relation: file
     *
     * @return FileAsset
     */
    public function pdf()
    {
        return $this->hasOne(FileAsset::class, 'id', 'pdf_id');
    }

    /**
     * relation: file
     *
     * @return FileAsset
     */
    public function txt()
    {
        return $this->hasOne(FileAsset::class, 'id', 'txt_id');
    }

    /**
     * relation: file
     *
     * @return FileAsset
     */
    public function original_rtf()
    {
        return $this->hasOne(FileAsset::class, 'id', 'original_rtf_id');
    }

    /**
     * relation: file
     *
     * @return FileAsset
     */
    public function original_pdf()
    {
        return $this->hasOne(FileAsset::class, 'id', 'original_pdf_id');
    }

    /**
     * relation: file
     *
     * @return FileAsset
     */
    public function original_txt()
    {
        return $this->hasOne(FileAsset::class, 'id', 'original_txt_id');
    }

    /**
     * generate code
     *
     * @return void
     */
    public function GenerateCode()
    {
        $code = Carbon::now()->format('Ymd') . $this->case_id . '_' . $this->id;
        $this->code = $code;
        $this->save();
    }

    public function GetName()
    {

        $prefix = $this::PDF_PREFIX_NAME;
        $suffix = $this->code;

        $name = $prefix . $suffix;

        return $name;
    }

    /**
     * get pdf view
     * 
     * @return string
     */
    public function GetPdfSchemaPath()
    {
        $path = false;

        if ($this->case) {
            $motion = Motion::find($this->case->motion_id);
            if ($motion) {
                $path = $motion->GetPdfSchemaPath();
            }
        }

        return $path;
    }

    /**
     * get rtf view
     *
     * @return string
     */
    public function GetRtfSchemaPath()
    {
        $path = false;

        if ($this->case) {
            $motion = Motion::find($this->case->motion_id);
            if ($motion) {
                $path = $motion->GetRtfSchemaPath();
            }
        }

        return $path;
    }

    /**
     * create pdf
     *
     * @return void
     */
    public function CreatePdf()
    {
        //get path
        $path = Parameters::PATH_PDF_MOTION;
        $filename = $this->GetName()  . '.pdf';

        //get parameters
        $handler = new PdfMotion($this->case->motion_id, $this->case_id);
        $parameters = $handler->PrepareParameters();

        //create file
        $file = PdfCreator::CreatePdfFile($path, $filename, $this->GetPdfSchemaPath(), $parameters);

        //save file to database
        $asset = FileCreator::CreateFileAsset($filename, $file, $this::PATH_DIRECTORY_ID);
        $this->UpdateOriginalPdf($asset->id);
        CaseCreator::CreateCaseMotionVersion($this->case_id, 2, $asset->id, $asset->name, 1);
    }

    /**
     * create rtf file
     *
     * @return void
     */
    public function CreateRtf()
    {
        //get path
        $prefix = Parameters::PATH_PDF_MOTION;
        $filename = $this->GetName() . '.rtf';
        $path = $prefix . '/' . $filename;
        $filepath = storage_path('app/public/' . $path);

        //get parameters
        $handler = new PdfMotion($this->case->motion_id, $this->case_id);
        $parameters = $handler->PrepareParameters();

        //get html output
        $output = FileManager::GetBladeOutput($this->GetRtfSchemaPath(), ['parameters' => $parameters]);

        //create file
        FileManager::CreateDocumentHtmlToRtf($output, $filepath);

        //save file to database
        $asset = FileCreator::CreateFileAsset($filename, $path, $this::PATH_DIRECTORY_ID);
        $this->UpdateOriginalRtf($asset->id);
        CaseCreator::CreateCaseMotionVersion($this->case_id, 1, $asset->id, $asset->name, 1);
    }

    public function CreateTxt()
    {
        //get path
        $prefix = Parameters::PATH_PDF_MOTION;
        $filename = $this->GetName() . '.txt';
        $path = $prefix . '/' . $filename;
        $filepath = storage_path('app/public/' . $path);

        //get parameters
        $handler = new PdfMotion($this->case->motion_id, $this->case_id);
        $parameters = $handler->PrepareParameters();

        //get html output
        $output = FileManager::GetBladeOutput($this->GetRtfSchemaPath(), ['parameters' => $parameters]);

        //create file
        FileManager::CreateDocumentHtmlToTxt($output, $filepath);

        //save file to database
        $asset = FileCreator::CreateFileAsset($filename, $path, $this::PATH_DIRECTORY_ID);
        $this->UpdateOriginalTxt($asset->id);
        CaseCreator::CreateCaseMotionVersion($this->case_id, 3, $asset->id, $asset->name, 1);
    }

    /**
     * update attribute
     *
     * @param string $value
     * @return void
     */
    public function UpdatePdf($value)
    {
        $this->pdf_id = $value;
        $this->save();
        $this->case->RecordEvent(CaseEventEnum::EVENT_UPDATE_CASE_MOTION_PDF);
    }

    /**
     * update attribute
     *
     * @param string $value
     * @return void
     */
    public function UpdateRtf($value)
    {
        $this->rtf_id = $value;
        $this->save();
        $this->case->RecordEvent(CaseEventEnum::EVENT_UPDATE_CASE_MOTION_RTF);
    }

    /**
     * update attribute
     *
     * @param string $value
     * @return void
     */
    public function UpdateTxt($value)
    {
        $this->txt_id = $value;
        $this->save();
        $this->case->RecordEvent(CaseEventEnum::EVENT_UPDATE_CASE_MOTION_TXT);
    }

    /**
     * update attribute
     *
     * @param string $value
     * @return void
     */
    public function UpdateOriginalPdf($value)
    {
        $this->original_pdf_id = $value;
        $this->save();
    }

    /**
     * update attribute
     *
     * @param string $value
     * @return void
     */
    public function UpdateOriginalRtf($value)
    {
        $this->original_rtf_id = $value;
        $this->save();
    }

    /**
     * update attribute
     *
     * @param string $value
     * @return void
     */
    public function UpdateOriginalTxt($value)
    {
        $this->original_txt_id = $value;
        $this->save();
    }

    /**
     * swap file 
     *
     * @param int $file_id
     * @param int $type_id 1-rtf, 2-pdf
     * @return void
     */
    public function SwapFile($new_file_id, $type_id)
    {
        $old_file_id = null;
        $new_file = FileAsset::find($new_file_id);

        switch ($type_id) {
            case 1:
                $old_file_id = $this->rtf_id;
                $this->UpdateRtf($new_file_id);
                $this->ConvertRtfToPdf($new_file_id);
                break;
            case 2:
                $old_file_id = $this->pdf_id;
                $this->UpdatePdf($new_file_id);
                break;
            case 3:
                $old_file_id = $this->txt_id;
                $this->UpdateTxt($new_file_id);
                break;
        }

        $this->UpdateVersion($old_file_id, $type_id);
        CaseCreator::CreateCaseMotionVersion($this->case_id, $type_id, $new_file_id, $new_file->name, true);
    }

    /**
     * update version
     *
     * @param int $file_id
     * @param int $type_id 1-rtf, 2-pdf
     * @return void
     */
    public function UpdateVersion($file_id, $type_id)
    {
        $current_file = FileAsset::find($file_id);

        if ($current_file) {
            $current_version = CaseMotionVersion::where('case_id', $this->case_id)->where('file_id', $file_id)->where('is_primary', 1)->first();
            if (!$current_version) CaseCreator::CreateCaseMotionVersion($this->case_id, $type_id, $file_id, $current_file->name, false);
            else $current_version->TogglePrimary(false);
        }
    }

    /**
     * convert rtf file to pdf
     *
     * @param int $rtf_id
     * @return void
     */
    public function ConvertRtfToPdf($rtf_id)
    {
        $file_rtf = FileAsset::find($rtf_id);
        $rtf_path = storage_path('app/public/' . $file_rtf->filename);
        $rtf_path = str_replace("\\", "/", $rtf_path);

        if ($file_rtf) {
            $html_filename = storage_path('app/public/' . $file_rtf->filename . '.html');
            $html_filename = str_replace("\\", "/", $html_filename);
            $pdf_filename = $this->GetName()  . Carbon::now()->toDateString() . '.pdf';
            $path = Parameters::PATH_PDF_MOTION . '/' . $pdf_filename;
            $pdf_path = storage_path('app/public/' . $path);
            $pdf_path = str_replace("\\", "/", $pdf_path);

            $html = FileManager::SaveRtfToHtml($rtf_path, $html_filename);
            $pdf = FileManager::SaveHtmlToPdf($html_filename, $pdf_path);
            $asset = FileCreator::CreateFileAsset($pdf_filename, $path, $this::PATH_DIRECTORY_ID);

            $this->SwapFile($asset->id, 2);
        }
    }
}
