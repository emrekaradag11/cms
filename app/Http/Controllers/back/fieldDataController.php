<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\field_data;
use Illuminate\Http\Request;

class fieldDataController extends Controller
{

    public function setFieldData(Request $request)
    {

        $fieldModel = new field_data();
        $fieldModel->setFieldData($request);

        return redirect()->back();

    }
    public function updateFieldData(Request $request)
    {

        $fieldModel = new field_data();
        $fieldModel->updateFieldData($request);

        return redirect()->back();

    }

}
