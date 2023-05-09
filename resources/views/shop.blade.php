<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Magazin') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1 style="text-align:center; font-size: 35px;">Categorii</h1>
        </div>
            <div class="container mt-100">                       
                <div class="row">
                    @foreach($categories as $category)
                        <div class="col-md-4 col-sm-6">
                            <div class="card mb-30">
                                <a class="card-img-tiles" href="shop/{{$category->category}}" data-abc="true">
                                    <div class="inner">
                                    <div class="main-img"><img src="{{URL($category->path1)}}" alt="{{$category->name}}"></div>
                                    <div class="thumblist">
                                        <img src="{{URL($category->path2)}}" alt="{{$category->name}}">
                                        <img src="{{URL($category->path3)}}" alt="{{$category->name}}">
                                    </div>
                                </a>
                            </div>
                            <div class="card-body text-center">
                                <h4 class="card-title">{{ $category->category }}</h4>
                                <p class="text-muted">Incepand de la {{ $category->starting_price }} RON</p>
                                <a class="btn btn-outline-primary btn-sm" href="shop/{{$category->category}}" data-abc="true">Vezi produsele</a>
                            </div>
                            </div>
                        </div>
                    @endforeach
                </div>
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
        width: 65%;
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
    .thumblist {
        width: 35%;
        border-left: 1px solid #e1e7ec !important;
        display: table-cell;
        width: 65%;
        padding: 15px;
        vertical-align: middle;
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