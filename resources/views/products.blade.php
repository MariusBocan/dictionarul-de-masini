<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Magazin') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1 style="text-align:center; font-size: 35px; margin-top: 45px;">Produse</h1>
    </div>

    <div class="container mt-100">                       
        <div class="row">
            @foreach($product_id as $product)
                <div class="col-md-4 col-sm-6">
                    <div class="card mb-30">
                        <div class="inner">
                            <div class="main-img">
                                <img src="{{URL($product->image)}}" alt="{{$product->name}}">
                            </div>
                        </div>
                        <div class="card-body text-center">
                            <h4 class="card-title">{{$product->brand}} {{$product->name}}</h4>
                            <p class="text-muted">Pret: {{$product->price}} RON</p>
                            @if ($product->quantity >= 1)
                            <a href="/add-to-cart/{{$product->id}}">
                                <button class="btn btn-outline-success btn-sm" href="/add-to-cart/{{$product->id}}" data-abc="true">
                                    Adauga in cos
                                </button>
                            </a>
                        @else
                            <a href="#">
                                <button disabled class="btn btn-danger">
                                    Stoc insuficient !
                                </button>
                            </a>
                        @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>



<style>
    body {
    background-color: #eee
}
    .mt-100{
        margin-top: 100px;
}
    .card {
    border-radius: 7px !important;
    border-color: #e1e7ec;
}

    .mb-30 {
        margin-bottom: 30px !important;
}

    .card-img-tiles {
        display: block;
        border-bottom: 1px solid #e1e7ec;
}

    a {
        color: #0da9ef;
        text-decoration: none !important;
}

    .card-img-tiles>.inner {
        display: table;
        width: 100%;
}

    .card-img-tiles .main-img, .card-img-tiles .thumblist {
        display: table-cell;
        padding: 15px;
        vertical-align: middle;
}

    .card-img-tiles .main-img>img:last-child, .card-img-tiles .thumblist>img:last-child {
        margin-bottom: 0;
}

    .card-img-tiles .main-img>img, .card-img-tiles .thumblist>img {
        display: block;
        width: 100%;
        margin-bottom: 6px;
}

    .card-img-tiles .thumblist>img {
        display: block;
        width: 100%;
        margin-bottom: 6px;
}
    .btn-group-sm>.btn, .btn-sm {
        padding: .45rem .5rem !important;
        font-size: .875rem;
        line-height: 1.5;
        border-radius: .2rem;
}
</style>