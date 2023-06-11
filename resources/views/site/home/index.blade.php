@extends('site.layouts.master')

@section('title')

الرئيسية

@endsection

@section('css')

<style>

.slider {

    width: 100%;

    height: 510px;

    position: relative;

  }



  .slider img {

    width: 100%;

    height: 500px;

    position: absolute;

    top: 0;

    left: 0;

    /* transition: all 0.5s ease-in-out; */

  }



  .slider img:first-child {

    z-index: 1;

  }



  .slider img:nth-child(2) {

    z-index: 0;

  }



  .navigation-button {

    text-align: center;

    position: relative;

  }



  .dot {

    cursor: pointer;

    height: 15px;

    width: 15px;

    margin: 0 2px;

    background-color: #bbb;

    border-radius: 50%;

    display: inline-block;

  }

  .dot:hover {

    background-color: #717171;

}

$body-color: #333;

$gray-300: #dee2e6;

$font-size-base: 1rem;

$font-size-sm: ($font-size-base * 0.875);

$border-radius: 0.25rem;

$spacer: 1rem; // 16px



$sidebar-breakpoint: 768px;

$sidebar-base-width: 280px;

$header-md-height: 4.5rem;

$sidebar-spacer-y: $spacer * 0.5;

$font-size-xs: ($font-size-base * 0.75);

$font-weight-semibold: 500;

$default-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12),

	0 1px 2px rgba(0, 0, 0, 0.24);

	

&.sidebar-default {

	.category-content .nav li > a {

		color: $body-color;

		&.active,

		&[aria-expanded="true"],

		&:hover,

		&:focus {

			background-color: #f4f4f4;

		}

	}

}



.car-title {

	position: absolute;

	color: #eceae9;

	font-size: 31px;

	font-weight: bold;

	line-height: 40px;

	right: 11%;

	top: 31%;

	width: 308px;

	z-index: 1;

}

.nav-link{

	font-size: 17px;

}
.nav>li>a:hover{
  color: black !important
}
</style>

@endsection

@section('content')

<div class="container text-right" style="padding-top:10px;direction:ltr">

    @include('site.includes.components.alert')

	<div class="row">

		<div class="col-sm-2 col-md-2">

			<div class="sidebar-nav" >

				<div class="navbar navbar-default" role="navigation" style="background: #000000;">

					<div class="category-content">

						<ul id="fruits-nav" class="nav flex-column"> 

							@isset($categories)

							@foreach($categories as $category)

							<li class="nav-item">

								<a href="{{route('books.category',$category->slug)}}" class="nav-link" style="font-weight:bold;padding:5px 15px !important;color:white">

									{{$category->name}}

								</a>

							</li>

							@endforeach

							@endisset

						</ul>

					</div>

				</div>

			</div>

		</div>

		<div class="col-sm-10 col-md-10">

		    @isset($sliders)

		    @if(count($sliders)>0)

        <div class="container">  

          <div class="slider" style="padding:10px">

            

            @foreach($sliders as $key=>$slide)

            <div>

              <img style="line-height: 1;"

              id="img-1"

              src="{{asset('assets/books/sliders/'.$slide->image)}}"

              alt="{{$slide->title}}"/>

            </div>

            

            <div class="car-title">

              <p>{{$slide->title}}</p>

            </div>

            

            @endforeach

          

          </div>

    			<div class="navigation-button">

    				@foreach($sliders as $key=>$slide)

    				<span class="dot {{$key==0 ? 'active' :'' }}" onclick="changeSlide('{{$key}}')"></span>

    				@endforeach

    			</div>

    		</div>

        @endisset

    		@endif

        @include('site.includes.components.new_product')



		</div>

	</div>

  @include('site.includes.components.top_selling')

</div>





@endsection

@section('js')

<script>

	  var currentImg = 0;

  var imgs = document.querySelectorAll('.slider img');

  let dots = document.querySelectorAll('.dot');

  var interval = 3000;



  // Second banner

  var secondEventTitle = 'Hi! *Freshmen* Orientation Day';



  // Third banner

  var thirdEventDate = new Date('2023-02-01'); // pull this from database

  var thirdEventDateString = thirdEventDate.toLocaleDateString('en-us', { year: 'numeric', month: 'short', day: 'numeric' });

  var days = calculateDays(new Date(), thirdEventDate) || 0;

  const countdownText = days > 0 ? `${days} days left` : 'Live Now!';



  var secondImageUrl = `https://ondemand.bannerbear.com/simpleurl/01YWAxB7nGYdJrKoXM/title/text/${encodeURIComponent(secondEventTitle)}`;

  var thirdImageUrl = `https://ondemand.bannerbear.com/simpleurl/ley9O0B2ZGbB4GjRDY/date/text/${encodeURIComponent(

    thirdEventDateString

  )}/countdown/text/${encodeURIComponent(countdownText)}`;



  document.getElementById('img-2').src = secondImageUrl;

  document.getElementById('img-3').src = thirdImageUrl;



  var timer = setInterval(changeSlide, interval);



  function changeSlide(n) {

    for (var i = 0; i < imgs.length; i++) {

      imgs[i].style.opacity = 0;

      dots[i].className = dots[i].className.replace(' active', '');

    }



    currentImg = (currentImg + 1) % imgs.length;



    if (n != undefined) {

      clearInterval(timer);

      timer = setInterval(changeSlide, interval);

      currentImg = n;

    }



    imgs[currentImg].style.opacity = 1;

    dots[currentImg].className += ' active';

  }



  function calculateDays(today, eventDate) {

    const difference = eventDate.getTime() - today.getTime();



    return Math.ceil(difference / (1000 * 3600 * 24)); // convert to days

  }

</script>

@endsection