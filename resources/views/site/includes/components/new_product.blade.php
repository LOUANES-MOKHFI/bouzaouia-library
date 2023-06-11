<div id="store" class="col-md-12">
    <div class="row">
        @isset($new_arrivals)
        @foreach($new_arrivals as $key=>$book)
        <div class="col-md-3 col-xs-6">
            @include('site.includes.components.book')
        </div>
        @endforeach
        @endisset
    </div>

</div>