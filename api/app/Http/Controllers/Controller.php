<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public function index(Request $request)
    {
        return [];
    }

    public function count(Request $request)
    {
         $input = str_split(
            preg_replace('/\W/', '', strtolower($request->input('input')))
        );

        foreach ($input as $key) {
            $output[$key] = $this->getValueForLetters($key);
        }
        return $output;
    }

    private function getValueForLetters($letter){
        return (strpos('heoi',$letter) !== false) ? 1: 2;
    }

}
