<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Review;

class ServiceUserController extends Controller
{
    public function index()
    {
        $reviews = Review::all();
        $services = Service::all();
        return view('service', [
            "title" => "Service",
            "services" => $services,
            "reviews" => $reviews
        ]);
    }

    public function detail($id)
    {
        $services = Service::where('id', $id)->first();


    // Pass the service data to the view
        return view('detailservice', [
            "title" => "Detail",
            'services' => $services
        ]);
    }

}
