<?php

namespace App\Http\Controllers\Find;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class FindController extends Controller
{
    public function FindLawyers(Request $request)
    {
        $success = false;
        $models = null;

        try {
            $models = User::search($request->keyword)->get();
            $success = true;
        } catch (Exception $e) {
            Log::error($e);
        }

        return response()->json(array('result' => $success, 'data' => $models), 200);
    }
}
