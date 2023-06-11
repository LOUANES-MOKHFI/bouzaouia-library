

<div class="card product-item border-0 mb-4">
    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
        <img class="img-fluid w-100" src="{{asset('assets/books/cover/'.$book->cover)}}" alt="{{$book->title}}">
    </div>
    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
        <h6 class="text-truncate mb-3">{{$book->title}}</h6>
        <div class="d-flex justify-content-center">
            @if($book->special_price == 1)<h6>{{$book->special_price_value}}</h6><h6 class="text-muted ml-2"><del>{{$book->price}}</del>@else {{$book->price}} @endif</h6>
        </div>
    </div>
    <div class="card-footer d-flex justify-content-between bg-light border">
        <a href="{{route('book.show',$book->slug)}}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>عرض </a>
        <a href="{{route('add_to_cart')}}" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>أضف الى السلة </a>
    </div>
</div>


