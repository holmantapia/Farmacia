<?php

return [

    'accepted' => 'El :attribute debe ser aceptado.',
    'active_url' => 'El :attribute no es una URL válida.',
    'after' => 'El :attribute debe ser una fecha después de :date.',
    'alpha' => 'El :attribute solo puede contener letras.',
    'alpha_num' => 'El :attribute solo puede contener letras y números.',
    'array' => 'El :attribute debe ser un array.',
    'before' => 'El :attribute debe ser una fecha antes de :date.',
    'between' => [
        'numeric' => 'El :attribute debe estar entre :min y :max.',
        'file' => 'El :attribute debe estar entre :min y :max kilobytes.',
        'string' => 'El :attribute debe tener entre :min y :max caracteres.',
        'array' => 'El :attribute debe tener entre :min y :max elementos.',
    ],
    'boolean' => 'El campo :attribute debe ser verdadero o falso.',
    'confirmed' => 'La confirmación de :attribute no coincide.',
    'date' => 'El :attribute no es una fecha válida.',
    'date_format' => 'El :attribute no coincide con el formato :format.',
    'different' => 'El :attribute y :other deben ser diferentes.',
    'digits' => 'El :attribute debe ser :digits dígitos.',
    'digits_between' => 'El :attribute debe estar entre :min y :max dígitos.',
    'email' => 'El :attribute debe ser una dirección de correo válida.',
    'exists' => 'El :attribute seleccionado es inválido.',
    'filled' => 'El campo :attribute es obligatorio.',
    'image' => 'El :attribute debe ser una imagen.',
    'in' => 'El :attribute seleccionado es inválido.',
    'integer' => 'El :attribute debe ser un número entero.',
    'ip' => 'El :attribute debe ser una dirección IP válida.',
    'json' => 'El :attribute debe ser una cadena JSON válida.',
    'max' => [
        'numeric' => 'El :attribute no puede ser mayor que :max.',
        'file' => 'El :attribute no puede ser mayor que :max kilobytes.',
        'string' => 'El :attribute no puede ser mayor que :max caracteres.',
        'array' => 'El :attribute no puede tener más de :max elementos.',
    ],
    'min' => [
        'numeric' => 'El :attribute debe ser al menos :min.',
        'file' => 'El :attribute debe ser al menos :min kilobytes.',
        'string' => 'El :attribute debe tener al menos :min caracteres.',
        'array' => 'El :attribute debe tener al menos :min elementos.',
    ],
    'not_in' => 'El :attribute seleccionado es inválido.',
    'numeric' => 'El :attribute debe ser un número.',
    'present' => 'El campo :attribute debe estar presente.',
    'regex' => 'El formato de :attribute es inválido.',
    'required' => 'El campo :attribute es obligatorio.',
    'string' => 'El :attribute debe ser una cadena.',
    'url' => 'El formato de :attribute es inválido.',

    'custom' => [
        'nombre_medicamento' => [
            'required' => 'El nombre del medicamento es obligatorio.',
            'alpha_num' => 'El nombre del medicamento solo puede contener letras y números.',
        ],
        'tipo_medicamento' => [
            'required' => 'Debes elegir un tipo de medicamento.',
            'exists' => 'El tipo de medicamento seleccionado no es válido.',
        ],
        'cantidad' => [
            'required' => 'La cantidad de producto es obligatoria.',
            'integer' => 'La cantidad de producto debe ser un número entero.',
            'min' => 'La cantidad de producto debe ser al menos 1.',
        ],
        'distribuidor' => [
            'required' => 'Debes elegir un distribuidor.',
            'exists' => 'El distribuidor seleccionado no es válido.',
        ],
        'sucursal' => [
            'required' => 'Debes elegir al menos una sucursal.',
            'exists' => 'La sucursal seleccionada no es válida.',
            'max' => 'El campo :attribute no debe tener más de :max elementos.',
        ],
    ],

    'attributes' => [
        'nombre_medicamento' => 'nombre del medicamento',
        'tipo_medicamento' => 'tipo de medicamento',
        'cantidad' => 'cantidad',
        'distribuidor' => 'distribuidor',
        'sucursal' => 'sucursal',
    ],
];
