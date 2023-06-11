<div class="product">
    <div class="product-img">
        <img src="{{asset('assets/books/cover/'.$book->cover)}}" alt="{{$book->title}}" height="250px">
        <?php 
            $today = date('d-m-Y', strtotime(date("d-m-Y")));
            $created = date('d-m-Y', strtotime($book->created_at));
            $interval = date_diff(date_create($today),date_create($created));
            
        ?>
        @if($interval->format('%d')<30)
        <div class="product-label">
            <span class="new" style="font-weight: bold;font-size:16px">جديد</span>
        </div>
        @endif
    </div>
    <div class="product-body">
        <p class="product-category" style="font-size: 15px;font-family:asterisk-override,Jazeera, Inter, Cerebri Sans, Helvetica, Arial, sans-serif !important;font-weight:bold">{{$book->category->name}}</p>
        <h3 class="product-name" style="font-size:19px;font-family:asterisk-override,Jazeera, Inter, Cerebri Sans, Helvetica, Arial, sans-serif !important;font-weight:bold"><a href="{{route('book.show',$book->slug)}}">{{$book->title}}</a></h3>
        <h3 class="product-name" style="font-size:19px;font-family:asterisk-override,Jazeera, Inter, Cerebri Sans, Helvetica, Arial, sans-serif !important;font-weight:bold"><a href="#">{{$book->author}}</a></h3>
        <h4 class="product-price">@if($book->special_price == 1) {{$book->special_price_value}} DA  <del class="product-old-price">{{$book->price}} DA</del>@else {{$book->price}} @endif</h4>
        <!--div class="product-rating">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
        </div-->
        <div class="product-btns">
            
            <!--button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></ظbutton-->
            <a href="{{route('book.show',$book->slug)}}" class="quick-view" title="استضهار"><i class="fa fa-eye"></i><span class="tooltipp"></span></a>
        </div>
    </div>
    <div class="add-to-cart">
        <form action="{{route('add_to_cart')}}" method="get">
            @csrf
             <input type="hidden" name="id" value="{{$book->id}}">
             <input type="hidden" name="qty" value="1">
            <button class="add-to-cart-btn" style="font-family:asterisk-override,Jazeera, Inter, Cerebri Sans, Helvetica, Arial, sans-serif !important;font-weight:bold;"><i class="fa fa-shopping-cart"></i> أضف إلى السلة</button>
        </form>
    </div>
</div>