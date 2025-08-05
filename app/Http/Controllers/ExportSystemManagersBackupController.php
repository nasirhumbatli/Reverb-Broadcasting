<?php

namespace App\Http\Controllers;

use App\Jobs\ExportSystemManagersBackup;
use Illuminate\Http\Request;

class ExportSystemManagersBackupController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        dispatch(new ExportSystemManagersBackup(auth()->id(), auth()->user()->name));

        return redirect()->back();
    }
}
