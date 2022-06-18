<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ExportData extends Controller
{

public function export()
{
     $posts = DB::table('forms')->get()->toArray();
     
     $S=DB::table('family_members')->get()->toArray();
     $f=array_merge($posts,$S);

    $data = array(
        array("firstname" => "Mary", "lastname" => "Johnson", "age" => 25 ,"family_members"=>"John"),
        array("firstname" => "Amanda", "lastname" => "Miller", "age" => 18,"family_members"=>"Mary"),
        array("firstname" => "James", "lastname" => "Brown", "age" => 31,"family_members"=>"Amanda"),
        array("firstname" => "Patricia", "lastname" => "Williams", "age" => 7,"family_members"=>"James"),
        array("firstname" => "Michael", "lastname" => "Davis", "age" => 43,"family_members"=>"Patricia"),
        array("firstname" => "Sarah", "lastname" => "Miller", "age" => 24,"family_members"=>"Michael"),
        array("firstname" => "Patrick", "lastname" => "Miller", "age" => 27,"family_members"=>"Sarah"),
      );
      dd($posts,$data);

      function cleanData(&$str)
      {
        if($str == 't') $str = 'TRUE';
        if($str == 'f') $str = 'FALSE';
        if(preg_match("/^0/", $str) || preg_match("/^\+?\d{8,}$/", $str) || preg_match("/^\d{4}.\d{1,2}.\d{1,2}/", $str)) {
          $str = "'$str";
        }
        if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
      }

      // filename for download
      $filename = "website_data_" . date('Ymd') . ".csv";

      header("Content-Disposition: attachment; filename=\"$filename\"");
      header("Content-Type: text/csv");

      $out = fopen("php://output", 'w');

      $flag = false;
      foreach($data as $row) {

        if(!$flag) {
          // display field/column names as first row
          fputcsv($out, array_keys($row), ',', '"');
          $flag = true;
        }
        array_walk($row, __NAMESPACE__ . '\cleanData');
        fputcsv($out, array_values($row), ',', '"');
      }

      fclose($out);
      exit;

}}

