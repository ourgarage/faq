<?php

namespace Ourgarage\Faq\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class FaqController extends Controller
{
    public function index()
    {
        \Title::prepend(trans('dashboard.title.prepend'));
        \Title::append(trans('faq::faq.index.title'));

        return view('faq::admin.index');
    }
}
