<?php

namespace App\Repositories;

class WordRepository
{
    public function convertToArray(string $string): Array
    {
        $string = preg_replace('/\s+/', ' ', $string);

        // Add enclosing brackets to make it valid JSON
        $string = '[' . rtrim($string, ',') . ']';
        $wordsArr = json_decode($string, true);
        if(!is_array($wordsArr))
        {
            $wordsArr['errors'] = ['Invalid format!'];
        }

        foreach($wordsArr as $word)
        {
            if(!array_key_exists('polish', $word))
            {
                $wordsArr['errors'] = ['Invalid format!'];
            }
        }

        return $wordsArr;

    }
}
