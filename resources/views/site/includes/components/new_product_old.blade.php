<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">

			<!-- section title -->
			<div class="col-md-10">
				<div class="section-title" style="text-align: right">
					<h3 class="title" style="font-family:asterisk-override,Jazeera, Inter, Cerebri Sans, Helvetica, Arial, sans-serif !important;font-weight:bold;">أحدث الكتب</h3>
				</div>
			</div>
			<!-- /section title -->

			<!-- Products tab & slick -->
			<div class="col-md-10">
				<div class="row">
					<div class="products-tabs">
						<!-- tab -->
						<div id="tab1" class="tab-pane active">
							<div class="products-slick" data-nav="#slick-nav-1">
                                @isset($new_arrivals)
                                    @foreach($new_arrivals as $key => $book)
                                        @include('site.includes.components.book')
                                    @endforeach
                                @endisset
                            </div>
							<div id="slick-nav-1" ></div>
						</div>
						<!-- /tab -->
					</div>
				</div>
			</div>
			
			<!-- Products tab & slick -->
		</div>
		<!-- /row -->
		
	</div>
	<!-- /container -->
	
</div>
<div class="section">
	<div class="container">
		<div class="row">
			<div style="float: left">
				<a class="btn" target="_blank" href="{{route('new_arrivals')}}" style="border-radius: 30px;border: 2px solid transparent;padding: 10px !important;width:150px;height:40px;background-color:#ef233c;color:white;font-weight:bold">عرض الجميع</a>
			</div>
		</div>
	</div>
</div>
