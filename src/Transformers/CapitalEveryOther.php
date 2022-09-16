<?php

namespace App\Transformers;

class CapitalEveryOther implements \Itransform
{

    public function transform(string $str) :string
    {
        // TODO: Implement transform() method.
        $strImplode = str_split($str);
        $caps = true;
        foreach ($strImplode as $key=>$letter){
            if ($letter !== ' '){
                if ($caps){
                    $out = strtoupper($letter);
                    $caps = false;
                }else {
                    $out = strtolower($letter);
                    $caps = true;
                }
                $strImplode[$key] = $out;
            }
        }
        $transformed = implode('',$strImplode);
        return $transformed;
    }
}