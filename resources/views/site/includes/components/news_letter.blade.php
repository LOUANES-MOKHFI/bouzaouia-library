<!-- <div id="newsletter" class="section">
	<div class="container">
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
	</div>
</div> -->

<div class="container-fluid bg-secondary my-5">
        <div class="row justify-content-md-center py-5 px-xl-5">
            <div class="col-md-6 col-12 py-5">
                <div class="text-center mb-2 pb-2">
                    <h2 class="section-title px-5 mb-3"><span class="bg-secondary px-2">Stay Updated</span></h2>
                    <p>Amet lorem at rebum amet dolores. Elitr lorem dolor sed amet diam labore at justo ipsum eirmod duo labore labore.</p>
                </div>
                <form action="">
                    <div class="input-group">
                        <input type="text" class="form-control border-white p-4" placeholder="Email Goes Here">
                        <div class="input-group-append">
                            <button class="btn btn-primary px-4">Subscribe</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>