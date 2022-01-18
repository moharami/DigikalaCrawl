@extends ('layout')


@section('content')

    <!-- Product section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="row gx-4 gx-lg-5 align-items-center">

                <div class="col-md-6">
                    <div class="small mb-1">SKU: BST-498</div>
                    <h1 class="display-5 fw-bolder">{{ $data['title'] }}</h1>
                    <div class="fs-5 mb-5">
                        <span>  {{ ' تومان' . $data['price'] }} </span>
                    </div>
                    <p class="lead">هشدار سامانه همتا: حتما در زمان تحویل دستگاه، به کمک کد فعال‌سازی چاپ شده روی جعبه
                        یا کارت گارانتی، دستگاه را از طریق #7777*، برای سیم‌کارت خود فعال‌سازی کنید. آموزش تصویری در
                        آدرس اینترنتی hmti.ir/05
                        امکان برگشت کالا در گروه تبلت با دلیل "انصراف از خرید" تنها در صورتی مورد قبول است که پلمپ کالا
                        باز نشده باشد.</p>
                    <div class="d-flex">
                        <input class="form-control text-center me-3" id="inputQuantity" type="num" value="1"
                               style="max-width: 3rem"/>
                        <button class="btn btn-outline-dark flex-shrink-0" type="button">
                            <i class="bi-cart-fill me-1"></i>

                        </button>
                    </div>
                </div>
                <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0"
                                           src="{{ $data['image'] }}" alt="..."/></div>
            </div>
        </div>
    </section>

@endsection
