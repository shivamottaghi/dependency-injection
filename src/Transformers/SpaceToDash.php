<?php

namespace App\Transformers;

class SpaceToDash implements \Itransform
{

    // TODO: Implement transform() method.
    public function transform(string $str) :string
    {
        $strImplode = str_split($str);
        foreach ($strImplode as $key=>$letter){
            if ($letter == ''){
                $strImplode[$key] = '-';
            }
        }
        return implode('', $strImplode);
    }
}