<?php

namespace App\Http\Controllers\Dictionary;

use App\Http\Controllers\Controller;
use App\Http\Managers\DictionaryManager;
use App\Http\Updators\DictionaryUpdator;
use App\Models\Dictionary\Dictionary;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DictionaryUpdateController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * update attribute
     *
     * @param * $model
     * @param * $value
     * @param string $selector
     * @return void
     */
    public function Update($model, $value, $selector)
    {
        $success = false;

        try {
            if ($model == null) throw new Exception();
            DictionaryUpdator::Selector($model, $value, $selector);
            $success = true;
            request()->session()->flash('alert-success', __('messages.update_success'));
        } catch (Exception $e) {
            $success = false;
            Log::error($e);
            request()->session()->flash('alert-danger', __('messages.update_fail'));
        }
    }

    /**
     * update model
     *
     * @param Request $request
     * @param string $attribute_name
     * @return void
     */
    public function UpdateModel($id, $value, $attribute_name, $dictionary_id)
    {
        $dictionary = Dictionary::find($dictionary_id);
        $model = DictionaryManager::GetOne($dictionary->table_name, $id);
        $this->Update($model, $value, $attribute_name);
        return redirect()->back();
    }

    /**
     * update model
     *
     * @param Request $request
     * @return void
     */
    public function UpdateName(Request $request)
    {
        return $this->UpdateModel($request->id, $request->name, 'name', $request->dictionary_id);
    }

    /**
     * update model
     *
     * @param Request $request
     * @return void
     */
    public function UpdateCategory(Request $request)
    {
        return $this->UpdateModel($request->id, $request->category_id, 'category_id', $request->dictionary_id);
    }

    /**
     * update model
     *
     * @param Request $request
     * @return void
     */
    public function UpdatePath(Request $request)
    {
        return $this->UpdateModel($request->id, $request->path, 'path', $request->dictionary_id);
    }

    /**
     * update model
     *
     * @param Request $request
     * @return void
     */
    public function UpdateOrder(Request $request)
    {
        return $this->UpdateModel($request->id, $request->order, 'order', $request->dictionary_id);
    }

    /**
     * update model
     *
     * @param Request $request
     * @return void
     */
    public function UpdateDescription(Request $request)
    {
        return $this->UpdateModel($request->id, $request->description, 'description', $request->dictionary_id);
    }

    /**
     * update model
     *
     * @param Request $request
     * @return void
     */
    public function UpdateDescriptionShort(Request $request)
    {
        return $this->UpdateModel($request->id, $request->description, 'description_short', $request->dictionary_id);
    }

    /**
     * update model
     *
     * @param Request $request
     * @return void
     */
    public function UpdateIconFilename(Request $request)
    {
        return $this->UpdateModel($request->id, $request->icon_filename, 'icon_filename', $request->dictionary_id);
    }

    /**
     * update model
     *
     * @param Request $request
     * @return void
     */
    public function UpdateType(Request $request)
    {
        return $this->UpdateModel($request->id, $request->type, 'type', $request->dictionary_id);
    }

    /**
     * update model
     *
     * @param Request $request
     * @return void
     */
    public function UpdateAgreement(Request $request)
    {
        return $this->UpdateModel($request->id, $request->agreement, 'agreement', $request->dictionary_id);
    }

    /**
     * update model
     *
     * @param Request $request
     * @return void
     */
    public function UpdateIsRequired(Request $request)
    {
        return $this->UpdateModel($request->id, $request->is_required, 'is_required', $request->dictionary_id);
    }

    /**
     * update model
     *
     * @param Request $request
     * @return void
     */
    public function UpdateSection(Request $request)
    {
        return $this->UpdateModel($request->id, $request->section_id, 'section_id', $request->dictionary_id);
    }

    /**
     * update model
     *
     * @param Request $request
     * @return void
     */
    public function UpdateTag(Request $request)
    {
        return $this->UpdateModel($request->id, $request->tag_id, 'tag_id', $request->dictionary_id);
    }

    /**
     * update model
     *
     * @param Request $request
     * @return void
     */
    public function UpdateFilename(Request $request)
    {
        return $this->UpdateModel($request->id, $request->filename, 'filename', $request->dictionary_id);
    }

    /**
     * update model
     *
     * @param Request $request
     * @return void
     */
    public function UpdateModule(Request $request)
    {
        return $this->UpdateModel($request->id, $request->module_id, 'module_id', $request->dictionary_id);
    }

    /**
     * update model
     *
     * @param Request $request
     * @return void
     */
    public function UpdateColor(Request $request)
    {
        return $this->UpdateModel($request->id, $request->color, 'color', $request->dictionary_id);
    }

    /**
     * update model
     *
     * @param Request $request
     * @return void
     */
    public function UpdateIcon(Request $request)
    {
        return $this->UpdateModel($request->id, $request->icon, 'icon', $request->dictionary_id);
    }

    /**
     * update model
     *
     * @param Request $request
     * @return void
     */
    public function UpdateUrl(Request $request)
    {
        return $this->UpdateModel($request->id, $request->url, 'url', $request->dictionary_id);
    }

    /**
     * update model
     *
     * @param Request $request
     * @return void
     */
    public function UpdateSmtp(Request $request)
    {
        return $this->UpdateModel($request->id, $request->smtp_id, 'smtp_id', $request->dictionary_id);
    }

    /**
     * update model
     *
     * @param Request $request
     * @return void
     */
    public function UploadIcon(Request $request)
    {
        try {
            $dictionary = Dictionary::find($request->dictionary_id);
            $model = DictionaryManager::GetOne($dictionary->table_name, $request->id);
            if ($model == null) throw new Exception();
            DictionaryUpdator::UploadIcon($model, $request->icons);
            $success = true;
            request()->session()->flash('alert-success', __('messages.update_success'));
        } catch (Exception $e) {
            $success = false;
            Log::error($e);
            request()->session()->flash('alert-danger', __('messages.update_fail'));
        }

        return redirect()->back();
    }
}
