<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Form;

class ExportData extends Controller
{

    public function export(){
        $data = DB::statement("SET names 'utf8'");
        $data=[];
        $forms = Form::all();

        foreach ($forms as $form) {
            $family_members ="";
            foreach ($form->family_members as $member) {
                $family_members .= "اسم الفرد : $member->name
                    التولد : $member->birthday
                    الصلة : $member->kinship
                    النسب : $member->is_mr_name
                    العمل : $member->job
                    الحالة الصحية : $member->health_state
                    ***********
                ";
            }
            // dd($family_members);
            $data[] = [
                'ت' => $form->id,
                'اسم المخول' => $form->user->name,

                //Head of the family
                'رب الاسرة' => $form->head_family->name,
                'النسب' => $form->head_family->is_mr_name,
                'العمل' => $form->head_family->job,
                'الحالة' => $form->head_family->is_alive_name,
                'الدخل الشهري' => $form->head_family->salary,
                'رقم هاتف الأب' => $form->person->father_phonenumber,

                //Personal Info
                'مستوى الفقر' => $form->person->level_name,
                'عنوان السكن' => $form->person->location,
                'أقرب نقطة دالة' => $form->person->point,
                'نوع السكن' => $form->person->location_name,
                'الإيجار' => $form->person->rent,

                //Wife
                'اسم الزوجة' => $form->wife->name,
                'النسب' => $form->wife->is_mis_name,
                'الحالة' => $form->wife->state,
                'رقم هاتف الام' => $form->person->mother_phonenumber,

                //Give
                'الهبات' => $form->gives->count(),

                //Family Member
                'عدد افراد الأسرة' => $form->family_members->count(),
                'معلومات افراد العائلة' => $family_members,
            ];
        }

        // dd($data);
        function cleanData(&$str){
        if($str == 't') $str = 'TRUE';
        if($str == 'f') $str = 'FALSE';
        if(preg_match("/^0/", $str) || preg_match("/^\+?\d{8,}$/", $str) || preg_match("/^\d{4}.\d{1,2}.\d{1,2}/", $str)) {
            $str = "'$str";
        }
        if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
        }

        // filename for download
        $filename = "seven_snabl" . date('Ymd') . ".csv";

        header("Content-Disposition: attachment; filename=\"$filename\"");
        header("Content-Encoding: UTF-8 ");
        header("Content-type: text/csv; charset=UTF-8");
        echo chr(0xEF) . chr(0xBB) . chr(0xBF);
        $out = fopen("php://output", 'w');
        fputs($out, chr(0xEF) . chr(0xBB) . chr(0xBF));

        $flag = false;
        foreach($data as $row) {
            if(!$flag) {
                // display field/column names as first row
                fputcsv($out, array_keys($row), ',', '"');
                $flag = true;
            }
            array_walk($row, __NAMESPACE__ . '\cleanData');
            fputcsv($out, array_values($row), ',', '"');

            fclose($out);
            exit;
        }
    }
}
