<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;

class PreOrderRequest extends FormRequest
{
    use HasFactory;

    public function authorize()
    {
        return true;
    }

    public function rules(){
        return [
            'first_name' => 'required',
            'last_name'  => 'required',
            'email'      => 'required|email',
            'phone' => 'required|regex:/^(\+?\d{1,3}\s?)?\(?\d{3}\)?[\s.-]?\d{3}[\s.-]?\d{4}$/'
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'İsim alanı zorunludur.',
            'last_name.required' => 'Soyisim alanı zorunludur.',
            'email.required' => 'E-posta alanı zorunludur.',
            'email.email' => 'Geçerli bir e-posta adresi giriniz.',
            'phone.required' => 'Telefon alanı zorunludur.',
            'phone.regex' => 'Geçerli bir cep telefonu numarası giriniz.',
        ];
    }
}
