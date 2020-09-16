<?php


namespace App\Constants;


final class UserTypes
{
    const SUPERADMIN  = 1;
    const ADMIN       = 2;

    public static function getList()
    {
        $list = [
            self::SUPERADMIN   => trans('Super Admin'),
            self::ADMIN        => trans('Admin')
        ];
        return $list;
    }

    /**
     * @param $key
     * @return mixed|string
     */
    public static function getLabel($key)
    {
        return array_key_exists($key, self::getList()) ?
            self::getList()[$key] :
            "";
    }
}
