<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    //User

    public function getQA() {
        return view('user.pages.qa');
    }

    public function getAbout() {
        return view('user.pages.about');
    }

    public function getRegisterUser() {
        return view('user.pages.register');
    }

    public function getInformationUser() {
        return view('user.pages.informationUser');
    }

    //Admin

    public function getAdminIndex() {
        return view('admin.homepage.admin');
    }

}