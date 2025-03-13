<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register');
    }
    public function post(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'password' => 'required',
            'email' => 'required|unique:users',
        ], [
            'name.required' => 'Name Wajib Di Isi',
            'email.required' => 'Email Wajib Di Isi',
            'email.unique' => 'Email Sudah Ada ',
            'password.required' => 'Password Wajib Di Isi',
        ]);
        if ($validator->fails()) {
            flash()->addError('Gagal Menyimpan Data');
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $validatedData = $validator->validated();
        $validatedData['password'] = bcrypt($validatedData['password']);
        User::create($validatedData);
        flash('Berhasil Menambah Data');
        return redirect()->route('login.index');
    }
}
