<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateKategoriRequest extends Request
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
            'kategori_nama' => 'required|unique:kategori,kategori_kode,null,id,hapus,1'
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
           'kategori_nama.required' => 'Kode kategori harus diisi.',
           'kategori_nama.unique' => 'Kode kategori Sudah ada di database.'
       ];
   }
}
