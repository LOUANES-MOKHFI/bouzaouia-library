<div id="newsletter" class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<div class="col-md-12">
				<div class="newsletter" style="direction:rtl;font-family:asterisk-override,Jazeera, Inter, Cerebri Sans, Helvetica, Arial, sans-serif !important;font-weight:bold;"> 
					<p>أدخل بريدك الالكتروني ليصلك <strong> كل جديد</strong></p>
					<div id="statusSubscribe" style="display: none;color: red"></div>
					<form action="javascript:void(0);" type="post">
						{{ csrf_field() }}
						<input class="input" id="email" required onfocus="enableSubscriber();" type="email" placeholder="البريد الالكتروني">
						<button class="newsletter-btn" onclick="checkSubscriber();addSubscriber();" id="btnSubmit" style="font-family:asterisk-override,Jazeera, Inter, Cerebri Sans, Helvetica, Arial, sans-serif !important;font-weight:bold"><i class="fa fa-envelope"></i> تسجيل</button>
						
					</form>
					<ul class="newsletter-follow">
						@if(setting()->facebook != null)
						<li>
							<a href="{{setting()->facebook}}"><i class="fa fa-facebook"></i></a>
						</li>
						@endif
						@if(setting()->instagram != null)
						<li>
							<a href="{{setting()->instagram}}"><i class="fa fa-instagram"></i></a>
						</li>
						@endif

					</ul>
				</div>
			</div>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>