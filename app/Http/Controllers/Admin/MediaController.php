<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class MediaController extends Controller
{
    private ImageManager $imageManager;

    public function __construct()
    {
         if (class_exists(Driver::class)) {
            $this->imageManager = new ImageManager(new Driver());
        }
    }

    public function index()
    {
        return view('admin.media.index');
    }
}
