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

    if (!function_exists('reformater_montant2')){
        function reformater_montant2($money){
            $$money = str_replace('F CFA', '', strval($money));
            $cleanString = preg_replace('/([^0-9\.,])/i', '', $money);
            $onlyNumbersString = preg_replace('/([^0-9])/i', '', $money);
            $separatorsCountToBeErased = strlen($cleanString) - strlen($onlyNumbersString) - 1;
            $stringWithCommaOrDot = preg_replace('/([,\.])/', '', $cleanString, $separatorsCountToBeErased);
            $removedThousandSeparator = preg_replace('/(\.|,)(?=[0-9]{3,}$)/', '',  $stringWithCommaOrDot);
            return (int) str_replace(',', '.', $removedThousandSeparator);
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
        
        if(!function_exists('calculer_age')){
            function calculer_age($date){
                $date =strtotime($date);
                    $age = date('Y') - $date;
                   if (date('md') < date('md', strtotime($date))) {
                       return $age - 1;
                   }
                   return $age;
            }
        }

        if(!function_exists('file')){
            function file($champName){
                $file=$request->hasFile($champName);
                $emplacement='public/'.$champName;
                $extension=$file->getClientOriginalExtension();
                $fileName = $projet->personne_id.'-'.$champName.'.'.$extension;
                $file_url= $request[$champName]->storeAs($emplacement, $fileName); 
                return $file_url;
            }
            
        }

        
?>
