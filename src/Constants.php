<?php

namespace Zyimm\PhpConstants;

class Constants
{
    /**
     * 获取map
     *
     * @param string $const
     *
     * @return array
     */
    public static function getMap(string $const = ''): array
    {
        if (!empty($const)) {
            if (property_exists(static::class, $const)) {
                return array_column(static::${$const}, 'title', 'value');
            }
            if (method_exists(static::class, $const)) {
                return array_column(call_user_func([static::class, $const]), 'title', 'value');
            }
        }
        return [];
    }


    /**
     * getValue
     *
     * @param string $title
     * @param string $const
     *
     * @return int|string
     */
    public static function getValue(string $title = '', string $const = '')
    {
        $map = self::getMap($const);
        $map = array_flip($map);
        return $map[$title] ?? '';
    }

    public static function getValueByKey($key = '', $const = '')
    {
        $map = array_flip(self::getMapKey($const));
        return $map[$key] ?? '';
    }

    /**
     * getTitle
     *
     * @param string $value
     * @param string $const
     *
     * @return mixed|string
     */
    public static function getTitle(string $value = '', string $const = '')
    {
        $map = self::getMap($const);
        return $map[$value] ?? '';
    }

    /**
     * getMapWithTitle
     *
     * @param string $const
     *
     * @return array
     */
    public static function getMapWithTitle(string $const = ''): array
    {
        $map = self::getMap($const);
        return array_values($map);
    }

    public static function getConstKeyMap(string $const = '', string $field = 'value'): array
    {
        $const_value = [];
        if (!empty($const)) {
            if (property_exists(static::class, $const)) {
                $const_value = static::${$const};
            }
            if (method_exists(static::class, $const)) {
                $const_value = call_user_func([static::class, $const]);
            }
        }
        $map = [];
        foreach ($const_value as $k => $value) {
            $map[$k] = $value[$field] ?? null;
        }
        return $map;
    }


    /**
     * getMapWithValue
     *
     * @param string $const
     *
     * @return int[]|string[]
     */
    public static function getMapWithValue(string $const = ''): array
    {
        $map = self::getMap($const);
        return array_keys($map);
    }

    /**
     * getMapKey
     *
     * @param string $const
     *
     * @return array
     */
    public static function getMapKey(string $const = ''): array
    {
        $map = $temp = [];
        if (property_exists(static::class, $const)) {
            $temp = static::${$const};
        }

        if (method_exists(static::class, $const)) {
            $temp = call_user_func([static::class, $const]);
        }
        foreach ($temp as $k => $v) {
            $map[$v['value']] = $k;
        }
        return $map;
    }
}