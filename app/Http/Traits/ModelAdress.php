<?php

namespace App\Http\Traits;

trait ModelAdress
{
    public function getModelAdress($language): string
    {
        switch ($language) {
            case 'ukrainian':
                return 'App\Models\UaWord';
                break;

            case 'english':
                return 'App\Models\EnWord';
                break;

            case 'german':
                return 'App\Models\GeWord';
                break;

            case 'spanish':
                return 'App\Models\EsWord';
                break;

            default:
                return '';
                break;
        }
    }
}
