<?php

use App\Models\User;
use App\Models\Valeur;
if (!function_exists('getlibelle')) {
    function getlibelle($id)
        {
            $record = Valeur::where('id', $id)->first();
            $libelle = isset($record['libelle']) ? $record['libelle'] : "";
                return $libelle;
        }
    }
    if (!function_exists('getrepresentationmembre')) {
        function getrepresentationmembre($id)
            {
                $record = User::where('id', $id)->first();
                $structure_represente = isset($record['structure_represente']) ? $record['structure_represente'] : "";
                return getlibelle($structure_represente) ;
            }
        }
        if(!function_exists('format_prix')){
            function format_prix($prix){
                return number_format($prix, 0, ' ',' ');
            }
        }
        if(!function_exists('format_date')){
            function format_date($date){
                return  date('d-m-Y', strtotime($date));
            }
        }
?>
