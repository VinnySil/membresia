<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class DniValidator implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        
        if(!$this->isValidNif($value)) //Compruebo que el NIF sea válido
            $fail("El :attribute no es válido. Debe tener 8 numeros y una letra calculada.");
    }
    
    private function isValidNif($nif){

        $firstLetter = mb_strtoupper($nif[0]);
        $letrasNIF = [
            'T', 'R', 'W', 'A', 'G',
            'M', 'Y', 'F', 'P', 'D',
            'X', 'B', 'N', 'J', 'Z',
            'S', 'Q', 'V', 'H', 'L',
            'C', 'K', 'E'
        ];

        switch ($firstLetter) { //Compruebo si es un NIE y si es asi cambio la letra a su respectivo numero
            case 'X': $nif[0] = "0"; break;
            case 'Y': $nif[0] = "1"; break;
            case 'Z': $nif[0] = "2"; break;
        }

        $numNif = intval(mb_substr($nif, 0, -1)); //Sacamos todos los valores
        $idxLetter = $numNif%23; //Sacamos el resto de la division

        //Devuelvo true o false si es valido o no
        return $letrasNIF[$idxLetter] === mb_strtoupper($nif[mb_strlen($nif)-1]);
    }
}
