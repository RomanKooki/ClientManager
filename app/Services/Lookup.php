<?php
/**
 * ClientManager.
 *
 * @file Lookup.php
 * @project ClientManager
 *
 * @author Wayne Brummer
 */

/**
 * ClientManager.
 *
 * @file Lookup.php
 * @project ClientManager
 *
 * @author Wayne Brummer
 */

namespace App\Services;

use Cache;
use Illuminate\Support\Collection;

class Lookup
{
    const COMPANY = 1;

    /**
     * Generic lookup to find all data in Lookup field types.
     *
     * @param $model
     * @param string $value
     * @param string $key
     * @param bool   $isArray
     * @param string $orderBy
     * @param int    $type
     *
     * @return array|Collection
     */
    public static function getLookup($model, int $type, string $value = 'title', string $key = 'id', bool $isArray = true, $orderBy = 'id')
    {
        return Cache::get("LOOKUP_{$type}_SERVICE_{$value}_{$key}_{$isArray}", function () use ($model, $value, $key, $isArray, $orderBy) {
            $res = $model
                ->all()
                ->pluck($value, $key);

            if ($isArray) {
                return $res->toArray();
            }

            return $res;
        });
    }
}
