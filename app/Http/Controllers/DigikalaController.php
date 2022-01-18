<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use simplehtmldom\HtmlWeb;

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
        $price = $this->convert(str_replace(',','',$html->find('.c-product__seller-price-pure.js-price-value', 0)->text()));

        $data = ['title'=>$title,'image'=>$image,'price'=>$price];
        return view('ShowProduct',compact('data'));

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
