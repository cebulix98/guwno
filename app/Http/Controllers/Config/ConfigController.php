<?php

namespace App\Http\Controllers\Config;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;

class ConfigController extends Controller
{
    /**
     * regenerate database
     *
     * @return void
     */
    public function RefreshDatabase()
    {
        Artisan::call('migrate:fresh --seed');
        return redirect()->route('home');
    }

    /**
     * link storage to public
     *
     * @return void
     */
    public function LinkStorage()
    {
        Artisan::call('storage:link');
        request()->session()->flash('alert-success', __('messages.link_success'));
        return redirect()->route('home');
    }

    public function CheckSmtp()
    {
        $success = false;

        try {
        } catch (Exception $e) {
        }

        if ($success) request()->session()->flash('alert-success', __('messages.smtp_connection_success'));
        else request()->session()->flash('alert-danger', __('messages.smtp_connection_fail'));

        return redirect()->back();
    }

    /**
     * clear cache
     *
     * @return void
     */
    public function ClearCache()
    {
        Artisan::call('config:clear');
        Artisan::call('view:clear');
        Artisan::call('route:clear');
        Artisan::call('cache:clear');
        return redirect()->route('home');
    }

    public function SynchronizeNew()
    {
        try {
            Artisan::call('migrate');
            request()->session()->flash('alert-success', 'Utworzono nowe tabele');
        } catch (Exception $e) {
            Log::error($e);
            request()->session()->flash('alert-success', 'wyskoczyl jakis blad');
        }

        return redirect()->back();
    }
}
