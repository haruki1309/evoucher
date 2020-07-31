<?php

use App\Models\User;
use App\Models\Customer;

function generateVoucherCode($ignoreArr = [], $length = 10, $keyspace = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ')
{
    if ($length < 1) {
        throw new RangeException("Length must be a positive integer");
    }

    $code = '';

    do {
        $pieces = [];
        $max = mb_strlen($keyspace, '8bit') - 1;
        for ($i = 0; $i < $length; ++$i) {
            $pieces[] = $keyspace[random_int(0, $max)];
        }
        $code = implode('', $pieces);
    } while (in_array($code, $ignoreArr));

    return $code;
}

function getUserFullnameById($id)
{
    $user = User::find($id);
    return $user->first_name . ' ' . $user->last_name;
}

function getCustomerFullnameById($id)
{
    $customer = Customer::find($id);
    return $customer->first_name . ' ' . $customer->last_name;
}

function displayUnitPicklist($unit)
{
    if ($unit == 'vnd') {
        return 'VNĐ';
    } else if ($unit == 'percent') {
        return '%';
    }
}

function uploadFiles($location, $files)
{
    $paths = [];
    foreach ($files as $file) {
        $fileName = Str::random(10) . "_" . $file->getClientOriginalName();

        while (file_exists($location . $fileName)) {
            $fileName = Str::random(10) . "_" . $fileName;
        }

        $file->move($location, $fileName);
        $paths[] = $location . $fileName;
    }
    return $paths;
}

function slugify($text)
{
    // replace non letter or digits by -
    $text = preg_replace('~[^\pL\d]+~u', '-', $text);

    // transliterate
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

    // remove unwanted characters
    $text = preg_replace('~[^-\w]+~', '', $text);

    // trim
    $text = trim($text, '-');

    // remove duplicate -
    $text = preg_replace('~-+~', '-', $text);

    // lowercase
    $text = strtolower($text);

    if (empty($text)) {
        return 'n-a';
    }

    return $text;
}
