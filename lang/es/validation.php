<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | El following language lines contain the default erro messages used by
    | the validato class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'El :attribute debe ser aceptado.',
    'accepted_if' => 'El :attribute debe ser aceptado cuando :other es :value.',
    'active_url' => 'El :attribute no es una URL válida.',
    'after' => 'El :attribute debe ser una fecha despues de :date.',
    'after_or_equal' => 'El :attribute debe ser una fecha despues de o igual a :date.',
    'alpha' => 'El :attribute must only contain letters.',
    'alpha_dash' => 'El :attribute must only contain letras, numbers, dashes y underscores.',
    'alpha_num' => 'El :attribute must only contain letras y numbers.',
    'array' => 'El :attribute debe ser un arreglo.',
    'before' => 'El :attribute debe ser una fecha antes de :date.',
    'before_or_equal' => 'El :attribute debe ser una fecha antes de o igual a :date.',
    'between' => [
        'array' => 'El :attribute debe tener entre :min y :max items.',
        'file' => 'El :attribute debe ser entre :min y :max kilobytes.',
        'numeric' => 'El :attribute debe ser entre :min y :max.',
        'string' => 'El :attribute debe ser entre :min y :max characters.',
    ],
    'boolean' => 'El campo :attribute debes ser verdadero o falso.',
    'confirmed' => 'El :attribute confirmation does not match.',
    'current_password' => 'El password es incorrect.',
    'date' => 'El :attribute no es a valid date.',
    'date_equals' => 'El :attribute debe ser una fecha igual a :date.',
    'date_format' => 'El :attribute does not match the format :format.',
    'declined' => 'El :attribute debe ser declined.',
    'declined_if' => 'El :attribute debe ser declined cuando :other es :value.',
    'different' => 'El :attribute y :other debes ser different.',
    'digits' => 'El :attribute debe ser :digits digits.',
    'digits_between' => 'El :attribute debe ser entre :min y :max digits.',
    'dimensions' => 'El :attribute has inválido image dimensions.',
    'distinct' => 'El campo :attribute has a duplicate value.',
    'email' => 'El :attribute debe ser a valid email address.',
    'ends_with' => 'El :attribute must end with one of the following: :values.',
    'enum' => 'El :attribute seleccionado es inválido.',
    'exists' => 'El :attribute seleccionado es inválido.',
    'file' => 'El :attribute debe ser a file.',
    'filled' => 'El campo :attribute debe tener a value.',
    'gt' => [
        'array' => 'El :attribute debe tener more than :value items.',
        'file' => 'El :attribute debe ser greater than :value kilobytes.',
        'numeric' => 'El :attribute debe ser greater than :value.',
        'string' => 'El :attribute debe ser greater than :value characters.',
    ],
    'gte' => [
        'array' => 'El :attribute debe tener :value items o more.',
        'file' => 'El :attribute debe ser greater than o igual a :value kilobytes.',
        'numeric' => 'El :attribute debe ser greater than o igual a :value.',
        'string' => 'El :attribute debe ser greater than o igual a :value characters.',
    ],
    'image' => 'El :attribute debe ser an image.',
    'in' => 'El :attribute seleccionado es inválido.',
    'in_array' => 'El campo :attribute does not exist in :other.',
    'integer' => 'El :attribute debe ser an integer.',
    'ip' => 'El :attribute debe ser a valid IP address.',
    'ipv4' => 'El :attribute debe ser a valid IPv4 address.',
    'ipv6' => 'El :attribute debe ser a valid IPv6 address.',
    'json' => 'El :attribute debe ser a valid JSON string.',
    'lt' => [
        'array' => 'El :attribute debe tener less than :value items.',
        'file' => 'El :attribute debe ser less than :value kilobytes.',
        'numeric' => 'El :attribute debe ser less than :value.',
        'string' => 'El :attribute debe ser less than :value characters.',
    ],
    'lte' => [
        'array' => 'El :attribute must not have more than :value items.',
        'file' => 'El :attribute debe ser less than o igual a :value kilobytes.',
        'numeric' => 'El :attribute debe ser less than o igual a :value.',
        'string' => 'El :attribute debe ser less than o igual a :value characters.',
    ],
    'mac_address' => 'El :attribute debe ser a valid MAC address.',
    'max' => [
        'array' => 'El :attribute must not have more than :max items.',
        'file' => 'El :attribute must not be greater than :max kilobytes.',
        'numeric' => 'El :attribute must not be greater than :max.',
        'string' => 'El :attribute must not be greater than :max characters.',
    ],
    'mimes' => 'El :attribute debe ser a file of type: :values.',
    'mimetypes' => 'El :attribute debe ser a file of type: :values.',
    'min' => [
        'array' => 'El :attribute debe tener at least :min items.',
        'file' => 'El :attribute debe ser at least :min kilobytes.',
        'numeric' => 'El :attribute debe ser at least :min.',
        'string' => 'El :attribute debe ser at least :min characters.',
    ],
    'multiple_of' => 'El :attribute debe ser a multiple of :value.',
    'not_in' => 'El :attribute seleccionado es inválido.',
    'not_regex' => 'El :attribute format es inválido.',
    'numeric' => 'El :attribute debe ser a number.',
    'present' => 'El campo :attribute debes ser present.',
    'prohibited' => 'El campo :attribute es prohibited.',
    'prohibited_if' => 'El campo :attribute es prohibited cuando :other es :value.',
    'prohibited_unless' => 'El campo :attribute es prohibited unless :other es in :values.',
    'prohibits' => 'El campo :attribute prohibits :other from being present.',
    'regex' => 'El :attribute format es inválido.',
    'required' => 'El campo :attribute es required.',
    'required_array_keys' => 'El campo :attribute must contain entries for: :values.',
    'required_if' => 'El campo :attribute es requerido cuando :other es :value.',
    'required_unless' => 'El campo :attribute es requerido unless :other es in :values.',
    'required_with' => 'El campo :attribute es requerido cuando :values está presente.',
    'required_with_all' => 'El campo :attribute es requerido cuando :values están presentes.',
    'required_without' => 'El campo :attribute es requerido cuando :values no está presente.',
    'required_without_all' => 'El campo :attribute es requerido cuando none of :values están presentes.',
    'same' => 'El :attribute y :other must match.',
    'size' => [
        'array' => 'El :attribute must contain :size items.',
        'file' => 'El :attribute debe ser :size kilobytes.',
        'numeric' => 'El :attribute debe ser :size.',
        'string' => 'El :attribute debe ser :size characters.',
    ],
    'starts_with' => 'El :attribute must start with one of the following: :values.',
    'string' => 'El :attribute debe ser a string.',
    'timezone' => 'El :attribute debe ser a valid timezone.',
    'unique' => 'El :attribute has already been taken.',
    'uploaded' => 'El :attribute failed to upload.',
    'url' => 'El :attribute debe ser a valid URL.',
    'uuid' => 'El :attribute debe ser a valid UUID.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages fo attributes using the
    | convention "attribute.rule" to name the lines. Thes makes it quick to
    | specify a specific custom language line fo a given attribute rule.
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
    | El following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". Thes simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
