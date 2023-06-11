<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">

			<!-- section title -->
			<div class="col-md-12">
				<div class="section-title" style="text-align:right">
					<h3 class="title" style="font-family:asterisk-override,Jazeera, Inter, Cerebri Sans, Helvetica, Arial, sans-serif !important;font-weight:bold;">الأفضل مبيعا</h3>
				</div>
			</div>
			<!-- /section title -->

			<!-- Products tab & slick -->
			<div class="col-md-12">
				<div class="row">
					<div class="products-tabs">
						<!-- tab -->
						<div id="tab2" class="tab-pane fade in active">
							<div class="products-slick" data-nav="#slick-nav-2">
								@isset($best_sellers)
                                    @foreach($best_sellers as $key => $book)
                                        @include('site.includes.components.book')
                                    @endforeach
                                @endisset
							</div>
							<div id="slick-nav-2" ></div>
						</div>
						<!-- /tab -->
					</div>
				</div>
			</div>
			<!-- /Products tab & slick -->
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>