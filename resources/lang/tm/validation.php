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

    'accepted' => 'Bu :attribute kabul edilmelidir.',
    'accepted_if' => 'Bu :attribute, :other :value bolan ýagdaýynda kabul edilmelidir.',
    'active_url' => 'Bu :attribute gültan URL däl.',
    'after' => 'Bu :attribute :date-dan soň bir senä bolmaly.',
    'after_or_equal' => 'Bu :attribute :date-a çenli ýa-da deň bolmalydyr.',
    'alpha' => 'Bu :attribute diňe harpdan ybarat bolmalydyr.',
    'alpha_dash' => 'Bu :attribute diňe harp, san, çizgi we aşakdaky çizgi bilen doly bolmalydyr.',
    'alpha_num' => 'Bu :attribute diňe harp we sanlardan ybarat bolmalydyr.',
    'array' => 'Bu :attribute bir array bolmalydyr.',
    'before' => 'Bu :attribute :date-dan öň bir senä bolmaly.',
    'before_or_equal' => 'Bu :attribute :date-a çenli ýa-da deň bolmalydyr.',
    'between' => [
        'array' => 'Bu :attribute :min we :max item aralygynda bolmalydyr.',
        'file' => 'Bu :attribute :min we :max kilobyte aralygynda bolmalydyr.',
        'numeric' => 'Bu :attribute :min we :max aralygynda bolmalydyr.',
        'string' => 'Bu :attribute :min we :max harp aralygynda bolmalydyr.',
    ],
    'boolean' => 'Bu :attribute meýdançasy dogry ýa-da ýalňyş bolmalydyr.',
    'confirmed' => 'Bu :attribute tassyklamasy laýyk gelmeýär.',
    'current_password' => 'Parol ýalňyş.',
    'date' => 'Bu :attribute ygtybarly senä däl.',
    'date_equals' => 'Bu :attribute :date bilen deň senä bolmalydyr.',
    'date_format' => 'Bu :attribute formatyna :format laýyk gelmeýär.',
    'declined' => 'Bu :attribute ret edilmelidir.',
    'declined_if' => 'Bu :attribute, :other :value bolan wagty ret edilmelidir.',
    'different' => 'Bu :attribute we :other dürli bolmalydyr.',
    'digits' => 'Bu :attribute :digits san bolmalydyr.',
    'digits_between' => 'Bu :attribute :min we :max san aralygynda bolmalydyr.',
    'dimensions' => 'Bu :attribute geçersiz şekil ölçeglerine eýe.',
    'distinct' => 'Bu :attribute meýdançasyndaky gaýtalanan baha bar.',
    'doesnt_end_with' => 'Bu :attribute aşakdakiler bilen gutarmaly däldir: :values.',
    'doesnt_start_with' => 'Bu :attribute aşakdakiler bilen başlamaly däldir: :values.',
    'email' => 'Bu :attribute ygtybarly email adresi bolmalydyr.',
    'ends_with' => 'Bu :attribute aşakdakiler bilen gutarmaly: :values.',
    'enum' => 'Seçilen :attribute geçersiz.',
    'exists' => 'Seçilen :attribute geçersiz.',
    'file' => 'Bu :attribute bir faýl bolmalydyr.',
    'filled' => 'Bu :attribute meýdançasynda baha bolmalydyr.',
    'gt' => [
        'array' => 'Bu :attribute :value-den köp item bolmalydyr.',
        'file' => 'Bu :attribute :value kilobytdan köp bolmalydyr.',
        'numeric' => 'Bu :attribute :value-den köp bolmalydyr.',
        'string' => 'Bu :attribute :value harpyndan köp bolmalydyr.',
    ],
    'gte' => [
        'array' => 'Bu :attribute :value ýa-da ondan köp item bolmalydyr.',
        'file' => 'Bu :attribute :value kilobytdan ýa-da şondan köp bolmalydyr.',
        'numeric' => 'Bu :attribute :value ýa-da şondan köp bolmalydyr.',
        'string' => 'Bu :attribute :value ýa-da şondan köp harpyndan bolmalydyr.',
    ],
    'image' => 'Bu :attribute bir şekil bolmalydyr.',
    'in' => 'Seçilen :attribute geçersiz.',
    'in_array' => 'Bu :attribute meýdançasy :other-de ýok.',
    'integer' => ':attribute san bolmalydyr.',
    'ip' => 'Bu :attribute ygtybarly IP adresi bolmalydyr.',
    'ipv4' => 'Bu :attribute ygtybarly IPv4 adresi bolmalydyr.',
    'ipv6' => 'Bu :attribute ygtybarly IPv6 adresi bolmalydyr.',
    'json' => 'Bu :attribute ygtybarly JSON ýazgy bolmalydyr.',
    'lt' => [
        'array' => 'Bu :attribute :value-den az item bolmalydyr.',
        'file' => 'Bu :attribute :value kilobytdan az bolmalydyr.',
        'numeric' => 'Bu :attribute :value-den az bolmalydyr.',
        'string' => 'Bu :attribute :value harpyndan az bolmalydyr.',
    ],
    'lte' => [
        'array' => 'Bu :attribute :value-den köp item bolmaz.',
        'file' => 'Bu :attribute :value kilobytdan az ýa-da deň bolmalydyr.',
        'numeric' => 'Bu :attribute :value-den az ýa-da deň bolmalydyr.',
        'string' => 'Bu :attribute :value harpyndan az ýa-da deň bolmalydyr.',
    ],
    'mac_address' => 'Bu :attribute ygtybarly MAC adresi bolmalydyr.',
    'max' => [
        'array' => 'Bu :attribute :max itemden köp bolmaz.',
        'file' => 'Bu :attribute :max kilobytdan köp bolmaz.',
        'numeric' => 'Bu :attribute :max-den köp bolmaz.',
        'string' => 'Bu :attribute :max harpyndan köp bolmaz.',
    ],
    'max_digits' => 'Bu :attribute :max sanlardan köp bolmaz.',
    'mimes' => 'Bu :attribute :values görnüşindäki faýl bolmalydyr.',
    'mimetypes' => 'Bu :attribute :values görnüşindäki faýl bolmalydyr.',
    'min' => [
        'array' => 'Bu :attribute iň az :min item bolmalydyr.',
        'file' => 'Bu :attribute iň az :min kilobytdan bolmalydyr.',
        'numeric' => 'Bu :attribute iň az :min bolmalydyr.',
        'string' => 'Bu :attribute iň az :min harpyndan bolmalydyr.',
    ],
    'min_digits' => 'Bu :attribute iň az :min san bolmalydyr.',
    'multiple_of' => 'Bu :attribute :value köp bolup bilner.',
    'not_in' => 'Seçilen :attribute geçersiz.',
    'not_regex' => 'Bu :attribute formaty geçersiz.',
    'numeric' => 'Bu :attribute bir san bolmalydyr.',
    'password' => [
        'letters' => 'Bu :attribute iň az bir harpy ýatyrmaly.',
        'mixed' => 'Bu :attribute iň az bir baş we bir kiçi harpy ýatyrmaly.',
        'numbers' => 'Bu :attribute iň az bir san ýatyrmaly.',
        'symbols' => 'Bu :attribute iň az bir simwoldan ýatyrmaly.',
        'uncompromised' => 'Berlen :attribute maglumat ätiýaçlandyryşda ýüze çykdy. Başga bir :attribute saýlaň.',
    ],
    'present' => 'Bu :attribute meýdançasy bolmalydyr.',
    'prohibited' => 'Bu :attribute meýdançasy gadagan edilendir.',
    'prohibited_if' => 'Bu :attribute meýdançasy :other :value bolan wagty gadagan edilendir.',
    'prohibited_unless' => 'Bu :attribute meýdançasy :other :values-da bolmasa gadagan edilendir.',
    'prohibits' => 'Bu :attribute meýdançasy :other-in bolmagyny gadagan edýär.',
    'regex' => 'Bu :attribute formaty geçersiz.',
    'required' => ':attribute hökman doldurylmalydyr.',
    'required_array_keys' => 'Bu :attribute meýdançasy: :values üçin girizme bolmalydyr.',
    'required_if' => 'Bu :attribute meýdançasy :other :value bolan wagty hökmanydyr.',
    'required_if_accepted' => 'Bu :attribute meýdançasy :other kabul edilende hökmanydyr.',
    'required_unless' => 'Bu :attribute meýdançasy :other :values-da bolmasa hökmanydyr.',
    'required_with' => 'Bu :attribute meýdançasy :values bar bolan wagty hökmanydyr.',
    'required_with_all' => 'Bu :attribute meýdançasy :values bar bolan wagty hökmanydyr.',
    'required_without' => 'Bu :attribute meýdançasy :values ýok bolan wagty hökmanydyr.',
    'required_without_all' => 'Bu :attribute meýdançasy :values-yň hiç biri ýok bolan wagty hökmanydyr.',
    'same' => 'Bu :attribute we :other deň bolmalydyr.',
    'size' => [
        'array' => 'Bu :attribute :size item öz içine almaly.',
        'file' => 'Bu :attribute :size kilobytdan bolmalydyr.',
        'numeric' => 'Bu :attribute :size bolmalydyr.',
        'string' => 'Bu :attribute :size harpyndan bolmalydyr.',
    ],
    'starts_with' => 'Bu :attribute aşakdakiler bilen başlamaly: :values.',
    'string' => 'Bu :attribute bir ýazgy bolmalydyr.',
    'timezone' => 'Bu :attribute ygtybarly wagt zolak bolmalydyr.',
    'unique' => ':attribute eýýam ulanylýar.',
    'uploaded' => 'Bu :attribute ýüklendi.',
    'url' => 'Bu :attribute ygtybarly URL bolmalydyr.',
    'uuid' => 'Bu :attribute ygtybarly UUID bolmalydyr.',

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
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
