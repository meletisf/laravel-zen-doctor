<?php

namespace Meletisf\ZenDoctor\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use ZenDoctor;

class HealthController extends Controller
{
    public function index(Request $request)
    {
        ZenDoctor::runDiagnostics();
    }
}
