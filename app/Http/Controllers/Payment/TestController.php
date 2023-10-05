<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public const VIEW = "subpages.test.tpay";

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        return $this->GetView();
    }

    /**
     * get view
     *
     * @param array $models
     * @return void
     */
    public function GetView()
    {
        return view($this::VIEW, [
        ]);
    }
}
