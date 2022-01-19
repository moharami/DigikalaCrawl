<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Digikala</title>


{{--    <link rel="stylesheet" type="text/css" href="{{ url('css/pdf.css') }}">--}}

</head>
<body>
<div class="container mt-5 mb-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="upper p-4">
                    <div class="text-center">
                        <img src="https://www.digikala.com/static/files/bc60cf05.svg" class="center-block">
                    </div>

                </div>
                <hr>
                <div class="title">
{{--                    {{ $title }}--}}
                    {{ $title }}
                </div>


                <hr>
                <div class="text-center">
                    <img class="card-img-top mb-5 mb-md-0 image"
                         src="{{ $image }}" alt="..."/>
                </div>
                <hr>
                <div class="transaction mt-2 price">
                    <div class="text-center">
                        قیمت : {{ $price }} تومان
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
</div>
</div>
</body>
</html>
