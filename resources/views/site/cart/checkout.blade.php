@extends('site.layouts.master')
@section('title')
انهاء عملية البيع
@endsection
@section('css')
<style>
    table,td,th {text-align: right; direction: rtl;}
    .parent{
            height: 100vh;
        }
        .parent>.row{
            display: flex;
            align-items: center;
            height: 100%;
        }
        .col img{
            height:100px;
            width: 100%;
            cursor: pointer;
            transition: transform 1s;
            object-fit: cover;
        }
        .col label{
            overflow: hidden;
            position: relative;
        }
        .imgbgchk:checked + label>.tick_container{
            opacity: 1;
        }
/*         aNIMATION */
        .imgbgchk:checked + label>img{
            transform: scale(1.25);
            opacity: 0.3;
        }
        .tick_container {
            transition: .5s ease;
            opacity: 0;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            cursor: pointer;
            text-align: center;
        }
        .tick {
            background-color: #4CAF50;
            color: white;
            font-size: 16px;
            padding: 6px 12px;
            height: 40px;
            width: 40px;
            border-radius: 100%;
        }
</style>
@endsection
@section('content')

<div id="breadcrumb" class="section" style="text-align: right">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb-tree">
                    <li><a href="#">تأكيد الطلبية</a></li>
                    <li><a href="{{route('shoping_cart')}}">السلة</a></li>
                    <li><a href="{{route('home')}}">الرئيسية</a></li>


                </ul>
            </div>
        </div>
        <!-- /row -->
    </div>
</div>
@include('site.includes.components.alert')
<div class="section" style="direction: rtl">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <form action="{{route('validate_checkout')}}" method="post">
                @csrf
                <div class="col-md-7">
                    <!-- Billing Details -->
                    <div class="billing-details">
                        <div class="section-title">
                            <h3 class="title">معلومات العميل</h3>
                        </div>
                        <div class="form-group">
                            <input class="input" type="text" name="name" value="{{Auth::user() ? Auth::user()->name : ''}}" placeholder="الإسم و اللقب">
                        </div>
                        <div class="form-group">
                            <input class="input" type="email" name="email" value="{{Auth::user() ? Auth::user()->email : ''}}" placeholder="البريد الاكتروني">
                        </div>
                        <div class="section-title">
                            <h3 class="title">معلومات التوصيل</h3>
                        </div>
                        <div class="form-group">
                            <select name="state" id="state_id" class="form-control">
                                <option value="">-- اختر الولاية --</option>
                                @isset($states)
                                @foreach($states as $key=>$state)
                                    <option value="{{$state->id}}">{{$state->id.' - '.$state->name}}</option>
                                @endforeach
                                @endisset
                            </select>
                        </div>
                        <div class="form-group">
                            <input class="input" type="text" name="commune" placeholder="البلدية">
                        </div>
                        <div class="form-group">
                            <input class="input" type="text" name="adresse" placeholder="العنوان">
                        </div>
                        
                        <div class="form-group">
                            <input class="input" type="text" name="postal_code" placeholder="الرمز البريدي">
                        </div>
                        <div class="form-group">
                            <input class="input" type="tel" name="phone" placeholder="رقم الهاتف">
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="radio" name="paid_methode" value="0" class="PaidMethode"> الدفع عند التوصيل
                                </div>
                                <div class="col-md-6">
                                    <input type="radio" name="paid_methode" value="1" class="PaidMethode"> الدفع عن طريق CCP 
                                </div>
                            </div>
                            <div class="col-md-12" id="paidCCP" style="display:none">
                                <div class="card">
                                    <p style="font-weight: bold">CCP : <span class="text-danger">55457522 52</span></p>
                                    <p style="font-weight: bold">RIP BARIDIMOB : <span class="text-danger">0099999 55457522 52</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-checkbox">
                                <label for="create-account">
                                    <span></span>
                                    هل لديك حساب ؟<a href="{{route('login')}}" class="text-danger">قم بتسجيل الدخول</a>
                                </label>
                                <div class="caption">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p>
                                    <input class="input" type="password" name="password" placeholder="Enter Your Password">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Billing Details -->

                    
                    <!-- Order notes -->
                    <div class="order-notes">
                        <textarea class="input" placeholder="ملاحضة" name="note"></textarea>
                    </div>
                    <!-- /Order notes -->
                </div>

                <!-- Order Details -->
                <div class="col-md-5 order-details">
                    <div class="section-title text-center">
                        <h3 class="title">طلبيتك</h3>
                    </div>
                    <div class="order-summary">
                        <div class="order-col">
                            <div><strong>الكتاب</strong></div>
                            <div><strong>المجموع</strong></div>
                        </div>
                        <div class="order-products">
                            @isset($items)
                            @foreach($items as $key => $item)
                            <div class="order-col">
                                <div>{{$item->quantity}} x {{$item->title}}</div>
                                <div>{{$item->price}} دج</div>
                            </div>
                            @endforeach
                            @endisset
                            
                        </div>
                        <div class="order-col">
                            <div>التوصيل</div>
                            <div><strong><span id="statePrice">0</span> دج</strong></div>
                        </div>
                        <div class="order-col">
                            <div><strong>مجموع الطلبيات</strong></div>
                            <div><strong class="order-total" ><span id="totalOrder">{{\Jackiedo\Cart\Facades\Cart::name('shopping')->getSubtotal()}}</span> دج</strong></div>
                        </div>
                        <div class="order-col">
                            <div><strong>المجموع الكلي</strong></div>
                            <div><strong class="order-total"><span id="totalPrice">{{\Jackiedo\Cart\Facades\Cart::name('shopping')->getSubtotal()}}</span> دج</strong></div>
                        </div>
                    </div>
                    <div class="payment-method">
                    </div>
                    <div class="input-checkbox">
                        <input type="checkbox" id="terms">
                        <label for="terms">
                            <span></span>
                            لقد قرأت ووافقت على  <a href="#">الشروط والأحكام</a>
                        </label>
                    </div>
                    <button style="width: 400px" href="#" class="primary-btn order-submit">تأكيد الطلبية</button>
                </div>
            </form>
            <!-- /Order Details -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
@endsection
@section('js')
<script>
   
    $(".PaidMethode").click(function(){
            var value = $(".PaidMethode:checked").val();
            
            if(value == 0){
                $('#paidCCP').css('display','none');
            }else{
                $('#paidCCP').css('display','block');
            }
        });

        $("#state_id").change(function(){
            var state_id = $("#state_id").val();
            $.ajax({
                url:'get_state_info/'+state_id,
                type:'get',
                success:function(response){
                    if(response.status == 200){
                        var stateInfo = response.state;

                        var totalOrder = document.getElementById("totalOrder").innerText;
                        var statePrice = stateInfo.price;
                        var totalPrice = parseInt(totalOrder) + parseInt(statePrice);
                        //alert(totalPrice);
                        document.getElementById("statePrice").innerText = statePrice; 
                        document.getElementById("totalPrice").innerText = totalPrice; 
                    }else{
                        alert(response.msg);
                    }
                    
                }
            })
            
        });
</script>
@endsection