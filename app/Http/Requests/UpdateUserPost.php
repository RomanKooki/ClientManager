<?php
/**
 * ClientManager.
 *
 * @file UpdateUserPost.php
 * @project ClientManager
 *
 * @author Wayne Brummer <wayne@bru-tech.co.za>
 *
 * @category UserAuths
 *
 * @license WayneBrummer BruTech
 */

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserPost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'      => 'required',
            'address'   => 'required',
            'contact'   => 'required',
            'id_number' => 'required',
            'email'     => 'required',
        ];
    }
}
