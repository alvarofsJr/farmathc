<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Cnpj implements Rule
{
    public function passes($attribute, $value)
    {
        $cnpj = preg_replace('/\D/', '', $value);

        if (strlen($cnpj) != 14) return false;

        $invalidCnpjs = [
            '00000000000000', '11111111111111', '22222222222222',
            '33333333333333', '44444444444444', '55555555555555',
            '66666666666666', '77777777777777', '88888888888888',
            '99999999999999'
        ];
        if (in_array($cnpj, $invalidCnpjs)) return false;

        for ($t = 12; $t < 14; $t++) {
            $d = 0;
            $c = 0;
            for ($m = $t - 7; $m >= 2; $m--) $d += $cnpj[$c++] * $m;
            for ($m = 9; $m >= 2; $m--) $d += $cnpj[$c++] * $m;
            $d = ((10 * $d) % 11) % 10;
            if ($cnpj[$c] != $d) return false;
        }

        return true;
    }

    public function message()
    {
        return 'O :attribute não é um CNPJ válido.';
    }
}
