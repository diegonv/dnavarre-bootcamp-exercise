<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public function index(Request $request)
    {
        return [];
    }

    private function normalizeInput($input){
        return preg_replace('/\W/', '', 
            Str::ascii(strtolower($input))
        );
    }

    public function count(Request $request)
    {
        $input = $this->normalizeInput($request->input('input'));

        return collect(str_split($input))->mapWithKeys(function ($item) use ($input) { 
            return [$item => substr_count($input,$item)];
        });

    }

}
