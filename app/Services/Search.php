<?php
/**
 * ClientManager
 *
 * @file Search.php
 * @project ClientManager
 * @author Wayne Brummer
 */

/**
 * ClientManager
 *
 * @file Search.php
 * @project ClientManager
 * @author Wayne Brummer
 */

/**
 * ClientManager
 *
 * @file Search.php
 * @project ClientManager
 * @author Wayne Brummer
 */

namespace App\Services;

use DB;

class Search {

    public static function buildQuery(&$query, $keywords = '', $fields = array()) {

        # check if values not empty

        if( !empty($keywords) and !empty($fields) and is_array($fields) )
        {

            # remove special char like  / &

            $keywords = str_replace("'","''",stripslashes( $keywords) );

            # turn string into array

            $a_keywords = explode(' ', trim(strtolower($keywords)));

            # check if array not empty

            if( count($a_keywords) > 0)
            {

                $search_like = '%'.implode('%',$a_keywords).'%';

                $query->where(function($query) use ($fields, $search_like, $a_keywords)
                {

                    $query->where(function($sub_query) use ($fields, $search_like)
                    {

                        # loop through fields

                        foreach( $fields AS $key => $field )
                        {

                            if(empty($key))
                            {
                                $sub_query->where(DB::raw("LOWER($field)"),'LIKE',DB::raw("'$search_like'"));
                            } else {
                                $sub_query->orWhere(DB::raw("LOWER($field)"),'LIKE',DB::raw("'$search_like'"));
                            }

                        }

                    });

                    $query->orWhere(function($sub_query) use ($fields, $a_keywords) {

                        foreach( $fields AS $key => $field ) {

                            if(empty($key))
                            {

                                foreach($a_keywords AS $key2 => $keyword)
                                {

                                    if(empty($key2))
                                    {
                                        $sub_query->where(DB::raw("LOWER($field)"),'LIKE',DB::raw("'$keyword'"));
                                    } else {
                                        $sub_query->orWhere(DB::raw("LOWER($field)"),'LIKE',DB::raw("'$keyword'"));
                                    }

                                }

                            } else {

                                foreach($a_keywords AS $key2 => $keyword)
                                {
                                    $sub_query->orWhere(DB::raw("LOWER($field)"), 'LIKE', DB::raw("'$keyword'"));
                                }
                            }

                        }

                    });

                });
            }

        }

    }

}