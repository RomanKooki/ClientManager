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


            $path = '';

            if ($request->hasFile($name))
            {
                $file = $request->file($name);

                $filename = 'profile-photo-' . time() . '.' . $file->getClientOriginalExtension();

                $path = $file->storeAs($folder, $filename);

            }

            return url($path);

        }

    }