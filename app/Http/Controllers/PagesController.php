<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function about()
    {
        $name = 'Nils Strandkvist';

        $people = [
            'Olle',
            'Göran',
            'Börje'
        ];

        return view('pages.about', compact('name', 'people'));
    }

    public function contact()
    {
        return view('pages.contact');
    }
}
