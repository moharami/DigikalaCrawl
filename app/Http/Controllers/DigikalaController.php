<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use simplehtmldom\HtmlWeb;
use PDF;


class DigikalaController extends Controller
{
    public function ShowProduct($productId)
    {
        $baseUrl = 'https://www.digikala.com/product/';
        $url = $baseUrl . $productId;
        $client = new HtmlWeb();
        $html = $client->load($url);
        $image = $html->find('.js-gallery-img', 0)->attr['data-src'];
        $title = $html->find('.c-product__title', 0)->text();
        $price = $this->convert(str_replace(',', '', $html->find('.c-product__seller-price-pure.js-price-value', 0)->text()));

        $data = ['title' => $title, 'image' => $image, 'price' => $price];
        return view('ShowProduct', compact('data'));

    }


    public function PdfProduct($productId)
    {

        $filePath = 'pdf/'  . $productId . '.pdf';
        $exist = file_exists($filePath);
        if ($exist) {
            return response()->json([
                "pdf" => asset($filePath)
            ], 200);
        }


        $baseUrl = 'https://www.digikala.com/product/';
        $url = $baseUrl . $productId;
        $client = new HtmlWeb();
        $html = $client->load($url);
        $image = $html->find('.js-gallery-img', 0)->attr['data-src'];
        $title = $html->find('.c-product__title', 0)->text();
        $price = $this->convert(str_replace(',', '', $html->find('.c-product__seller-price-pure.js-price-value', 0)->text()));


        $data = ['title' => $title, 'image' => $image, 'price' => $price];
        $pdf = PDF::loadView('pdf', $data);

        file_put_contents($filePath, $pdf->output());
        return response()->json([
            "pdf" => asset($filePath)
        ], 200);

    }


    function convert($string)
    {
        $persian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
        $arabic = ['٩', '٨', '٧', '٦', '٥', '٤', '٣', '٢', '١', '٠'];

        $num = range(0, 9);
        $convertedPersianNums = str_replace($persian, $num, $string);
        $englishNumbersOnly = str_replace($arabic, $num, $convertedPersianNums);

        return $englishNumbersOnly;
    }
}
