<?php
/**
 * ClientManager
 *
 * @file FileService.php
 * @project ClientManager
 * @author Wayne Brummer
 */

/**
 * ClientManager
 *
 * @file FileService.php
 * @project ClientManager
 * @author Wayne Brummer
 */

    /**
     * Created by PhpStorm.
     * User: wayne
     * Date: 2018/03/22
     * Time: 09:50
     */

    namespace App\Services;


    use Storage;

    class FileService
    {
        /**
         * File uploader for images and documents.
         * pathway is prepended with date time as to avoid common file placement issues.
         *
         * @param $request
         * @param string $name
         * @param string $folder
         * @return string
         */
        public static function uploadFile($request, $name = '', $folder = '') {


            $file = '';

            if ($request->hasFile($name))
            {

                // create new file name
                $extension = $request->file($name)->getClientOriginalExtension();
                $time = date('Ymd_His');


                $file = $time . '/' . self::guid().'.'.$extension;

                // get path
                Storage::put(
                    $folder.'/'.$file,
                    file_get_contents($request->file($name)->getRealPath())
                );

            }

            return $file;

        }

        /**
         * Custom GUID Generator for file uploads.
         *
         * @param bool $prefix
         * @param bool $braces
         * @return string
         */
        public static function guid($prefix = false, $braces = false)
        {
            mt_srand((double) microtime() * 10000);
            $charid = strtoupper(md5(uniqid($prefix === false ? rand() : $prefix, true)));
            $hyphen = chr(45); // "-"
            $uuid = substr($charid, 0, 8) . $hyphen
                . substr($charid, 8, 4) . $hyphen
                . substr($charid, 12, 4) . $hyphen
                . substr($charid, 16, 4) . $hyphen
                . substr($charid, 20, 12);

            // Add brackets or not? "{" ... "}"
            return $braces ? chr(123) . $uuid . chr(125) : $uuid;
        }
    }