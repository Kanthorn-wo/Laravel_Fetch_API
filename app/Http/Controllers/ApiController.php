<?php
//composer require guzzlehttp/guzzle
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    public function index()
    {
        return view('show_data');
    }
    public function fetchData(Request $request)
    {

        $url = 'https://dataapi.moc.go.th/gis-product-prices';
        $productId = $request->name_product;
        $fromDate = $request->start_date;
        $toDate = $request->end_date;

        $response = Http::get($url, [
            'product_id' => $productId,
            'from_date' => $fromDate,
            'to_date' => $toDate,
        ]);

        $data = $response->json();
        // dd($data);
        return view('show_data', compact('data'));

    }
}