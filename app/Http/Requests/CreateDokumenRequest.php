<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateDokumenRequest extends Request
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
            'departemen_nama' => 'required|unique:departemen,departemen_kode,null,id,hapus,1'
        ];
    }
    
    /**
    * Get the error messages for the defined validation rules.
    *
    * @return array
    */
   public function messages()
   {
       return [
           'departemen_nama.required' => 'Kode departemen harus diisi.',
           'departemen_nama.unique' => 'Kode departemen Sudah ada di database.'
       ];
   }
}
