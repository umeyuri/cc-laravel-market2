<?php

return [

    'accepted'             => ':attributeを承認してください。',
    'active_url'           => ':attributeに有効なURLを入力してください。',
    'after'                => ':attributeに:date以降の日付を入力してください。',
    'after_or_equal'       => ':attributeには:dateかそれ以降の日付のみ入力できます。',
    'alpha'                => ':attributeには英字のみ入力できます。',
    'alpha_dash'           => ':attributeには英数字, ハイフン, アンダースコアのみ入力できます。',
    'alpha_num'            => ':attributeには英数字のみ入力できます。',
    'array'                => ':attributeには配列を入力してください。',
    'before'               => ':attributeには:date以前の日付のみ入力できます。',
    'before_or_equal'      => ':attributeには:dateかそれ以前の日付のみ入力できます。',
    'between'              => [
        'numeric' => ':attributeには:min〜:maxの数値を入力してください。',
        'file'    => ':attributeには:min〜:max KBのファイルを入力してください。',
        'string'  => ':attributeには:min〜:max文字の文字列を入力してください。',
        'array'   => ':attributeには:min〜:max個の要素の配列を入力してください。',
    ],
    'boolean'              => ':attributeの値が不正です。',
    'confirmed'            => ':attributeが確認用の値と一致しません。',
    'date'                 => ':attributeには正しい形式の日付を入力してください。',
    'date_format'          => '":format"という形式の日付を入力してください。',
    'different'            => ':attributeには:otherと異なる値を入力してください。',
    'digits'               => ':attributeには:digits桁の数値を入力してください。',
    'digits_between'       => ':attributeには:min〜:max桁の数値を入力してください。',
    'dimensions'           => ':attributeの画像サイズが不正です。',
    'distinct'             => '指定された:attributeは既に存在しています。',
    'email'                => ':attributeがメールアドレスの形式ではありません。',
    'exists'               => '指定された:attributeは存在しません。',
    'file'                 => ':attributeにはファイルを指定してください。',
    'filled'               => ':attributeが未入力です。',
    'image'                => ':attributeには画像ファイルを指定してください。',
    'in'                   => ':attributeには:valuesのうちのいずれかを指定してください。',
    'in_array'             => ':attributeが:otherに含まれていません。',
    'integer'              => ':attributeには整数を入力してください。',
    'ip'                   => ':attributeには正しい形式のIPアドレスを入力してください。',
    'ipv4'                 => ':attributeには正しい形式のIPv4アドレスを入力してください。',
    'ipv6'                 => ':attributeには正しい形式のIPv6アドレスを入力してください。',
    'json'                 => ':attributeには正しい形式のJSON文字列を入力してください。',
    'max'                  => [
        'numeric' => ':attributeには:max以下の数値を入力してください。',
        'file'    => ':attributeには:max KB以下のファイルを入力してください。',
        'string'  => ':attributeには:max文字以下の文字列を入力してください。',
        'array'   => ':attributeには:max個以下の要素の配列を入力してください。',
    ],
    'mimes'                => ':attributeには:valuesのみ指定できます。',
    'mimetypes'            => ':attributeには:valuesのみ指定できます。',
    'min'                  => [
        'numeric' => ':attributeには:min以上の数値を入力してください。',
        'file'    => ':attributeには:min KB以上のファイルを入力してください。',
        'string'  => ':attributeには:min文字以上の文字列を入力してください。',
        'array'   => ':attributeには:min個以上の要素を持つ配列を入力してください。',
    ],
    'not_in'               => ':attributeに:valuesを指定することはできません。',
    'numeric'              => ':attributeに数値を入力してください。',
    'present'              => ':attributeに現在時刻を入力してください。',
    'regex'                => '正しい形式の:attributeを入力してください。',
    'required'             => ':attributeは必須です。',
    'required_if'          => ':otherが:valueのときは:attributeを必ず指定してください。',
    'required_unless'      => ':otherが:values以外のときは:attributeを必ず指定してください。',
    'required_with'        => ':valuesのうちいずれかが指定されたときは:attributeを必ず指定してください。',
    'required_with_all'    => ':valuesのうちすべてが指定されたときは:attributeを必ず指定してください。',
    'required_without'     => ':valuesのうちいずれかがが指定されなかったときは:attributeを必ず指定してください。',
    'required_without_all' => ':valuesのうちすべてが指定されなかったときは:attributeを必ず指定してください。',
    'same'                 => ':attributeが:otherと一致しません。',
    'size'                 => [
        'numeric' => ':attributeには:sizeを入力してください。',
        'file'    => ':attributeには:size KBのファイルを入力してください。',
        'string'  => ':attributeには:size文字の文字列を入力してください。',
        'array'   => ':attributeには:size個の要素を持つ配列を入力してください。',
    ],
    'string'               => ':attributeに文字を入力してください。',
    'timezone'             => ':attributeに正しい形式のタイムゾーンを入力してください。',
    'unique'               => 'その:attributeはすでに使われています。',
    'uploaded'             => ':attributeのアップロードに失敗しました。',
    'url'                  => ':attributeには正しい形式のURLを入力してください。',

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    'attributes' => [
        'name' => '名前',
        'description' => '商品説明',
        'price' => '価格',
        
    ],

];
