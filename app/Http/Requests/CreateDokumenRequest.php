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
            'dokumen_file'      => 'required',
            'dokumen_deskripsi' => 'required',
            'dokumen_author' => 'required'
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
           'dokumen_file.required'      => 'File harus diisi.',
           'dokumen_deskripsi.required' => 'Deskripsi harus diisi.',
           'dokumen_author.required'    => 'Author harus diisi.'
       ];
   }
}
