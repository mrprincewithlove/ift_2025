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

    'accepted' => 'Поле :attribute должно быть принято.',
    'accepted_if' => 'Поле :attribute должно быть принято, когда :other равно :value.',
    'active_url' => 'Поле :attribute не является действительным URL.',
    'after' => 'Поле :attribute должно быть датой после :date.',
    'after_or_equal' => 'Поле :attribute должно быть датой после или равной :date.',
    'alpha' => 'Поле :attribute может содержать только буквы.',
    'alpha_dash' => 'Поле :attribute может содержать только буквы, цифры, дефисы и подчеркивания.',
    'alpha_num' => 'Поле :attribute может содержать только буквы и цифры.',
    'array' => 'Поле :attribute должно быть массивом.',
    'before' => 'Поле :attribute должно быть датой до :date.',
    'before_or_equal' => 'Поле :attribute должно быть датой до или равной :date.',
    'between' => [
        'array' => 'Поле :attribute должно содержать от :min до :max элементов.',
        'file' => 'Поле :attribute должно быть от :min до :max килобайт.',
        'numeric' => 'Поле :attribute должно быть от :min до :max.',
        'string' => 'Поле :attribute должно содержать от :min до :max символов.',
    ],
    'boolean' => 'Поле :attribute должно быть true или false.',
    'confirmed' => 'Подтверждение :attribute не совпадает.',
    'current_password' => 'Неверный пароль.',
    'date' => 'Поле :attribute не является действительной датой.',
    'date_equals' => 'Поле :attribute должно быть датой, равной :date.',
    'date_format' => 'Поле :attribute не соответствует формату :format.',
    'declined' => 'Поле :attribute должно быть отклонено.',
    'declined_if' => 'Поле :attribute должно быть отклонено, когда :other равно :value.',
    'different' => 'Поле :attribute и :other должны быть разными.',
    'digits' => 'Поле :attribute должно содержать :digits цифр.',
    'digits_between' => 'Поле :attribute должно содержать от :min до :max цифр.',
    'dimensions' => 'Поле :attribute имеет неверные размеры изображения.',
    'distinct' => 'Поле :attribute содержит дублирующее значение.',
    'doesnt_end_with' => 'Поле :attribute не может заканчиваться одним из следующих значений: :values.',
    'doesnt_start_with' => 'Поле :attribute не может начинаться с одного из следующих значений: :values.',
    'email' => 'Поле :attribute должно быть действительным адресом электронной почты.',
    'ends_with' => 'Поле :attribute должно заканчиваться одним из следующих значений: :values.',
    'enum' => 'Выбранное значение для :attribute неверно.',
    'exists' => 'Выбранное значение для :attribute неверно.',
    'file' => 'Поле :attribute должно быть файлом.',
    'filled' => 'Поле :attribute должно содержать значение.',
    'gt' => [
        'array' => 'Поле :attribute должно содержать больше чем :value элементов.',
        'file' => 'Поле :attribute должно быть больше чем :value килобайт.',
        'numeric' => 'Поле :attribute должно быть больше чем :value.',
        'string' => 'Поле :attribute должно содержать больше чем :value символов.',
    ],
    'gte' => [
        'array' => 'Поле :attribute должно содержать :value элементов или больше.',
        'file' => 'Поле :attribute должно быть больше или равно :value килобайт.',
        'numeric' => 'Поле :attribute должно быть больше или равно :value.',
        'string' => 'Поле :attribute должно содержать больше или равно :value символов.',
    ],
    'image' => 'Поле :attribute должно быть изображением.',
    'in' => 'Выбранное значение для :attribute неверно.',
    'in_array' => 'Поле :attribute не существует в :other.',
    'integer' => 'Поле :attribute должно быть целым числом.',
    'ip' => 'Поле :attribute должно быть действительным IP-адресом.',
    'ipv4' => 'Поле :attribute должно быть действительным IPv4-адресом.',
    'ipv6' => 'Поле :attribute должно быть действительным IPv6-адресом.',
    'json' => 'Поле :attribute должно быть допустимой строкой JSON.',
    'lt' => [
        'array' => 'Поле :attribute должно содержать менее чем :value элементов.',
        'file' => 'Поле :attribute должно быть меньше чем :value килобайт.',
        'numeric' => 'Поле :attribute должно быть меньше чем :value.',
        'string' => 'Поле :attribute должно содержать меньше чем :value символов.',
    ],
    'lte' => [
        'array' => 'Поле :attribute не должно содержать больше чем :value элементов.',
        'file' => 'Поле :attribute должно быть меньше или равно :value килобайт.',
        'numeric' => 'Поле :attribute должно быть меньше или равно :value.',
        'string' => 'Поле :attribute должно содержать меньше или равно :value символов.',
    ],
    'mac_address' => 'Поле :attribute должно быть действительным MAC-адресом.',
    'max' => [
        'array' => 'Поле :attribute не должно содержать больше чем :max элементов.',
        'file' => 'Поле :attribute не должно быть больше чем :max килобайт.',
        'numeric' => 'Поле :attribute не должно быть больше чем :max.',
        'string' => 'Поле :attribute не должно содержать больше чем :max символов.',
    ],
    'max_digits' => 'Поле :attribute не должно содержать больше чем :max цифр.',
    'mimes' => 'Поле :attribute должно быть файлом типа: :values.',
    'mimetypes' => 'Поле :attribute должно быть файлом типа: :values.',
    'min' => [
        'array' => 'Поле :attribute должно содержать хотя бы :min элементов.',
        'file' => 'Поле :attribute должно быть хотя бы :min килобайт.',
        'numeric' => 'Поле :attribute должно быть хотя бы :min.',
        'string' => 'Поле :attribute должно содержать хотя бы :min символов.',
    ],
    'min_digits' => 'Поле :attribute должно содержать хотя бы :min цифр.',
    'multiple_of' => 'Поле :attribute должно быть кратно :value.',
    'not_in' => 'Выбранное значение для :attribute неверно.',
    'not_regex' => 'Формат поля :attribute неверен.',
    'numeric' => 'Поле :attribute должно быть числом.',
    'password' => [
        'letters' => 'Поле :attribute должно содержать хотя бы одну букву.',
        'mixed' => 'Поле :attribute должно содержать хотя бы одну заглавную и одну строчную букву.',
        'numbers' => 'Поле :attribute должно содержать хотя бы одну цифру.',
        'symbols' => 'Поле :attribute должно содержать хотя бы один символ.',
        'uncompromised' => 'Указанное :attribute появилось в утечке данных. Пожалуйста, выберите другой :attribute.',
    ],
    'present' => 'Поле :attribute должно быть присутствовать.',
    'prohibited' => 'Поле :attribute запрещено.',
    'prohibited_if' => 'Поле :attribute запрещено, когда :other равно :value.',
    'prohibited_unless' => 'Поле :attribute запрещено, если :other не находится в :values.',
    'prohibits' => 'Поле :attribute запрещает присутствие :other.',
    'regex' => 'Формат поля :attribute неверен.',
    'required' => 'Поле :attribute обязательно для заполнения.',
    'required_array_keys' => 'Поле :attribute должно содержать записи для: :values.',
    'required_if' => 'Поле :attribute обязательно, когда :other равно :value.',
    'required_if_accepted' => 'Поле :attribute обязательно, когда :other принято.',
    'required_unless' => 'Поле :attribute обязательно, если :other находится в :values.',
    'required_with' => 'Поле :attribute обязательно, когда :values присутствует.',
    'required_with_all' => 'Поле :attribute обязательно, когда :values присутствуют.',
    'required_without' => 'Поле :attribute обязательно, когда :values отсутствует.',
    'required_without_all' => 'Поле :attribute обязательно, когда ни одно из :values отсутствует.',
    'same' => 'Поле :attribute и :other должны совпадать.',
    'size' => [
        'array' => 'Поле :attribute должно содержать :size элементов.',
        'file' => 'Поле :attribute должно быть :size килобайт.',
        'numeric' => 'Поле :attribute должно быть :size.',
        'string' => 'Поле :attribute должно содержать :size символов.',
    ],
    'starts_with' => 'Поле :attribute должно начинаться с одного из следующих значений: :values.',
    'string' => 'Поле :attribute должно быть строкой.',
    'timezone' => 'Поле :attribute должно быть действительным временным поясом.',
    'unique' => 'Поле :attribute уже занято.',
    'uploaded' => 'Не удалось загрузить :attribute.',
    'url' => 'Поле :attribute должно быть действительным URL.',
    'uuid' => 'Поле :attribute должно быть действительным UUID.',

    /*
    |--------------------------------------------------------------------------
    | Пользовательские сообщения о валидации
    |--------------------------------------------------------------------------
    |
    | Здесь вы можете указать пользовательские сообщения о валидации для атрибутов,
    | используя соглашение "attribute.rule" для наименования строк. Это упрощает
    | указание конкретного пользовательского сообщения для заданного правила атрибута.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Пользовательские атрибуты валидации
    |--------------------------------------------------------------------------
    |
    | Следующие строки используются для замены заполнительного атрибута на более
    | удобное для чтения название, например "Адрес электронной почты" вместо "email".
    | Это помогает сделать наши сообщения более выразительными.
    |
    */

    'attributes' => [],

];
