<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    |  following language lines contain  default error messages used by
    |  validator class. Some of se rules have multiple versions such
    | as  size rules. Feel free to tweak each of se messages here.
    |
    */

    'accepted' => ' :attribute باید تایید شود',
    'accepted_if' => ' :attribute باید باشد accepted when :or is :value.',
    'active_url' => ' :attribute یک URL معتبر نیست.',
    'after' => ' :attribute باید باشد a date after :date.',
    'after_or_equal' => ' :attribute باید باشد a date after or equal to :date.',
    'alpha' => ' :attribute فقط باید شامل حروف باشد',
    'alpha_dash' => ' :attribute فقط باید شامل حروف، اعداد، خط تیره و زیرخط باشد.',
    'alpha_num' => ' :attribute فقط باید شامل حروف و اعداد باشد.',
    'array' => ' :attribute باید یک آرایه باشد',
    'before' => ' :attribute باید باشد a date before :date.',
    'before_or_equal' => ' :attribute باید باشد a date before or equal to :date.',
    'between' => [
        'numeric' => ' :attribute باید بین باشد :min and :max.',
        'file' => ' :attribute باید بین باشد :min و :max کیلوبایت.',
        'string' => ' :attribute باید بین باشد :min و :max کاراکتر.',
        'array' => ' :attribute must have between :min و :max موارد.',
    ],
    'boolean' => ' :attribute فیلد باید درست یا نادرست باشد.',
    'confirmed' => ' :attributeتایید مطابقت ندارد',
    'current_password' => 'رمز عبور نادرست است',
    'date' => ' :attribute تاریخ معتبری نیست',
    'date_equals' => ' :attribute باید باشد a date equal to :date.',
    'date_format' => ' :attribute does not match  format :format.',
    'declined' => ' :attribute باید رد شود',
    'declined_if' => ' :attribute زمانی که باید رد شود:or است :value.',
    'different' => ' :attribute and :or باید باشد different.',
    'digits' => ' :attribute باید باشد :digits digits.',
    'digits_between' => ' :attribute باید بین باشد :min و :max digits.',
    'dimensions' => ' :attribute has invalid image dimensions.',
    'distinct' => ' :attribute فیلد دارای مقدار تکراری است.',
    'email' => ' :attribute می بایست یک ایمیل ادرس معتبر باشد.',
    'ends_with' => ' :attribute باید با یکی از آنها تمام شود  following: :values.',
    'enum' => ' انتخاب شد :attribute نامعتبر است',
    'exists' => ' انتخاب شد  :attribute نامعتبر است',
    'file' => ' :attribute باید یک فایل باشد',
    'filled' => ' :attribute فیلد باید مقدار داشته باشد.',
    'gt' => [
        'numeric' => ' :attribute باید بیشتر از :value.',
        'file' => ' :attribute باید بیشتر از :value کیلوبایت.',
        'string' => ' :attribute باید بیشتر از :value کاراکتر.',
        'array' => ' :attributeباید بیشتر از   :value آیتم.',
    ],
    'gte' => [
        'numeric' => ' :attribute باید بیشتر از or equal to :value.',
        'file' => ' :attribute باید بیشتر از or equal to :value کیلوبایت.',
        'string' => ' :attribute باید بیشتر از or equal to :value کاراکتر.',
        'array' => ' :attribute باید داشته باشد :value آیتم یا بیشتر.',
    ],
    'image' => ' :attribute باید یک تصویر باشد',
    'in' => ' انتخاب شد  :attribute نامعتبر است',
    'in_array' => ' :attributeفیلد در وجود ندارد :or.',
    'integer' => ' :attribute باید یک عدد صحیح باشد',
    'ip' => ' :attribute  باید یک آدرس IP معتبر باشد.',
    'ipv4' => ' :attribute باید باشد a valid IPv4 address.',
    'ipv6' => ' :attribute باید باشد a valid IPv6 address.',
    'json' => ' :attribute باید باشد a valid JSON string.',
    'lt' => [
        'numeric' => ' :attributeباید کمتر از :value.',
        'file' => ' :attribute باید کمتر از :value کیلوبایت.',
        'string' => ' :attribute باید کمتر از :value کاراکتر.',
        'array' => ' :attribute باید کمتر از :value آیتم.',
    ],
    'lte' => [
        'numeric' => ' :attribute باید کمتر از or equal to :value.',
        'file' => ' :attribute باید کمتر از or equal to :value کیلوبایت.',
        'string' => ' :attribute باید کمتر از or equal to :value کاراکتر.',
        'array' => ' :attribute نباید بیشتر از :value آیتم.',
    ],
    'mac_address' => ' :attribute باید باشد a valid MAC address.',
    'max' => [
        'numeric' => ' :attribute نباید بیشتر از :max.',
        'file' => ' :attribute نباید بیشتر از :max کیلوبایت.',
        'string' => ' :attribute نباید بیشتر از :max کاراکتر.',
        'array' => ' :attribute نباید بیشتر از :max آیتم.',
    ],
    'mimes' => ' :attribute باید یک فایل از type: :values.',
    'mimetypes' => ' :attribute باید یک فایل از type: :values.',
    'min' => [
        'numeric' => ' :attribute باید حداقل باشد :min.',
        'file' => ' :attribute باید حداقل باشد :min کیلوبایت.',
        'string' => ' :attribute باید حداقل باشد :min کاراکتر.',
        'array' => ' :attribute باید حداقل باشد :min آیتم.',
    ],
    'multiple_of' => ' :attribute باید مضرب باشد:value.',
    'not_in' => ' انتخاب شد  :attribute نامعتبر است',
    'not_regex' => ' :attribute فرمت نامعتبر است',
    'numeric' => ' :attribute باید یک عدد باشد.',
    'password' => ' رمز عبور نادرست است',
    'present' => ' :attribute فیلد باید وجود داشته باشد',
    'prohibited' => ' :attribute فیلد ممنوع است',
    'prohibited_if' => ' :attribute field is prohibited when :or is :value.',
    'prohibited_unless' => ' :attribute field is prohibited unless :or is in :values.',
    'prohibits' => ' :attribute field prohibits :or from being present.',
    'regex' => ' :attribute فرمت نامعتبر است',
    'required' => ' :attribute فیلد  ضروری است.',
    'required_array_keys' => ' :attribute field must contain entries for: :values.',
    'required_if' => ' :attribute field is required when :or is :value.',
    'required_unless' => ' :attribute field is required unless :or is in :values.',
    'required_with' => ' :attribute field is required when :values is present.',
    'required_with_all' => ' :attribute field is required when :values are present.',
    'required_without' => ' :attribute field is required when :values is not present.',
    'required_without_all' => ' :attribute field is required when none of :values are present.',
    'same' => ' :attribute and :or must match.',
    'size' => [
        'numeric' => ' :attribute باید باشد :size.',
        'file' => ' :attribute باید باشد :size کیلوبایت.',
        'string' => ' :attribute باید باشد :size کاراکتر.',
        'array' => ' :attribute باید باشد :size آیتم.',
    ],
    'starts_with' => ' :attribute must start with one of  following: :values.',
    'string' => ' :attribute باید باشد  string.',
    'timezone' => ' :attribute  یک منطقه زمانی معتبر باید باشد' ,
    'unique' => ' :attribute قبلا گرفته شده.',
    'uploaded' => ' :attribute آپلود نشد',
    'url' => ' :attribute  یک URL معتبر باید باشد ',
    'uuid' => ' :attribute  یک UUID معتبر باید باشد ',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using 
    | convention "attribute.rule" to name  lines. This makes it quick to
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
    |  following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
