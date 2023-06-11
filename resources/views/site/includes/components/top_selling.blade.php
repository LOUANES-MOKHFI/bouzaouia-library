
	

<div class="container pt-5">
	<div class="text-center mb-4">
		<h2 class="section-title px-5"><span class="px-2">أفضل الاصدارات</span></h2>
	</div>
	<div class="row px-xl-5 pb-3">

		@foreach($best_sellers as $key => $book)
			<div class="col-lg-3 col-md-6 col-sm-12 pb-1">
				@include('site.includes.components.book')
			</div>
		@endforeach
			
			
	</div>
</div>


<!-- @isset($new_arrivals)
			@foreach($new_arrivals as $key => $book)
@endforeach
		@endisset -->



























