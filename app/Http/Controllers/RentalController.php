<?php

namespace App\Http\Controllers;

use App\Models\Rental;
use Illuminate\Http\Request;

class RentalController extends Controller
{
    public function index()
    {
        $data = Rental::where('user_id', auth()->user()->id)->latest()->paginate(2);

        return view('back-office.rental.index', [
            'data' => $data
        ]);
    }
}
