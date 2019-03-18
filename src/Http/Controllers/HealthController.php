<?php

namespace Meletisf\ZenDoctor\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use ZenDoctor;

class HealthController extends Controller
{
    public function index(Request $request)
    {
        foreach (ZenDoctor::getChecks() as $check) {
            try {
                ZenDoctor::runDiagnostic($check);
            } catch (\Exception $e) {
                print_r($e->getMessage().'<hr />');
            }
        }
    }
}
