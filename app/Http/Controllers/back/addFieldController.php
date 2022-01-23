<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\{add_field, add_field_dtl, field_data};
use Illuminate\Http\Request;


class addFieldController extends Controller
{
    public function setFields(Request $request)
    {
        $r = new add_field();
        $r->setField($request);
        return redirect()->back();
    }

    public function updateFields(Request $request)
    {
        $r = new add_field();
        $r->updateField($request);
        return redirect()->back();
    }

    public function getFieldWithId(Request $request)
    {
        $fieldModel = new add_field();
        $fieldDtlModel = new add_field_dtl();

        $field = $fieldModel->getFieldWithId($request->post("id"));
        $fieldDetail = $fieldDtlModel->getFieldDetailWithId($request->post("id"));

        $collection = collect(['field', 'fieldDetail']);
        $data = $collection->combine([$field, $fieldDetail]);

        return $data;
    }

    public function deleteField($id)
    {
        $fieldModel = new add_field();

        $res = $fieldModel->deleteField($id);

        if($res)
        {
            $noti = array(
                'message' => "Ek Alan Başarıyla silindi",
                'head'=>'İşlem Başarılı',
                'type' => 'success',
                'status' => '200'
            );
        }
        else
        {
            $noti = array(
                'message' => "Ek Alan silinemedi",
                'head'=>'Hata Oluştu',
                'type' => 'warning',
                'status' => '404'
            );
        }
        return redirect()->back()->with($noti);

    }


    public function sortable(Request $request){

        if($request->ajax()){
            $addFieldModel = new add_field();
            $response = $addFieldModel->change_order($request->post("data"));
        }
        return $response;

    }

}
