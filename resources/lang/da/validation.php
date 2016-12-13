<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => ':attribute skal være accepteret.',
    'active_url'           => ':attribute er en ugyldig URL.',
    'after'                => ':attribute skal være en dato efter :date.',
    'alpha'                => ':attribute må kun indeholde bogstaver.',
    'alpha_dash'           => ':attribute må kun indeholde tal, bogstaver, og bindestrege.',
    'alpha_num'            => ':attribute må kun indeholde tal og bogstaver.',
    'array'                => ':attribute skal være et array.',
    'before'               => ':attribute skal være en dato før :date.',
    'between'              => [
        'numeric' => ':attribute skal være mellem :min og :max.',
        'file'    => ':attribute skal være mellem :min og :max kilobytes.',
        'string'  => ':attribute skal være mellem :min og :max tegn.',
        'array'   => ':attribute skal være mellem :min og :max items.',
    ],
    'boolean'              => ':attribute feltet skal være sandt eller falsk.',
    'confirmed'            => ':attribute bekræftelse matcher ikke.',
    'date'                 => ':attribute er ikke en gyldig dato.',
    'date_format'          => ':attribute matcher ikke formattet :format.',
    'different'            => ':attribute og :other skal være forskellige.',
    'digits'               => ':attribute skal være :digits numre.',
    'digits_between'       => ':attribute skal være mellem :min og :max numre.',
    'dimensions'           => ':attribute har ugyldige billededimensioner.',
    'distinct'             => ':attribute feltet har en duplikeret værdi.',
    'email'                => ':attribute skal være en gyldig e-mail.',
    'exists'               => 'Valgte :attribute er ugyldig.',
    'file'                 => ':attribute skal være en fil.',
    'filled'               => ':attribute feltet er påkrævet.',
    'image'                => ':attribute skal være et billede.',
    'in'                   => 'Den valgte :attribute er ugyldig.',
    'in_array'             => ':attribute feltet eksisterer ikke i :other.',
    'integer'              => ':attribute skal være en integer.',
    'ip'                   => ':attribute skal være en gyldig IP adresse.',
    'json'                 => ':attribute skal være en gyldig JSON string.',
    'max'                  => [
        'numeric' => ':attribute må ikke være større end :max.',
        'file'    => ':attribute må ikke være større end :max kilobytes.',
        'string'  => ':attribute må ikke være større end :max characters.',
        'array'   => ':attribute må ikke have mere end :max items.',
    ],
    'mimes'                => ':attribute skal være en fil af type: :values.',
    'mimetypes'            => ':attribute skal være en fil af type: :values.',
    'min'                  => [
        'numeric' => ':attribute skal minimum være :min.',
        'file'    => ':attribute skal minimum være :min kilobytes.',
        'string'  => ':attribute skal minimum være :min tegn.',
        'array'   => ':attribute skal minimum have :min items.',
    ],
    'not_in'               => 'Den valgte :attribute er ugyldig.',
    'numeric'              => ':attribute skal være et tal.',
    'present'              => ':attribute feltet skal være til stede.',
    'regex'                => ':attribute formattet er ugyldigt.',
    'required'             => ':attribute feltet er påkrævet.',
    'required_if'          => ':attribute feltet er påkrævet når :other er :value.',
    'required_unless'      => ':attribute feltet er påkrævet med mindre :other er i :values.',
    'required_with'        => ':attribute feltet er påkrævet når :values er tilstedeværende.',
    'required_with_all'    => ':attribute feltet er påkrævet når :values er tilstedeværende.',
    'required_without'     => ':attribute feltet er påkrævet når :values ikke er tilstedeværende.',
    'required_without_all' => ':attribute feltet er påkrævet når ingen af :values er tilstedeværende.',
    'same'                 => ':attribute og :other skal matche.',
    'size'                 => [
        'numeric' => ':attribute skal være :size.',
        'file'    => ':attribute skal være :size kilobytes.',
        'string'  => ':attribute skal være :size characters.',
        'array'   => ':attribute skal indeholde :size items.',
    ],
    'string'               => ':attribute skal være en string.',
    'timezone'             => ':attribute skal være en gyldig zone.',
    'unique'               => ':attribute er allerede taget.',
    'uploaded'             => ':attribute fejlede at blive uploadet.',
    'url'                  => ':attribute formattet er ugyldigt.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
