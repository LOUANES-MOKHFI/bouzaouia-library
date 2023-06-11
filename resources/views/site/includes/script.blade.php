<script src="{{asset('assets/site/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/site/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/site/js/slick.min.js')}}"></script>
<script src="{{asset('assets/site/js/nouislider.min.js')}}"></script>
<script src="{{asset('assets/site/js/jquery.zoom.min.js')}}"></script>
<script src="{{asset('assets/site/js/main.js')}}"></script>


<script type="text/javascript">
    function checkSubscriber(){
        var email = $("#email").val();
        $.ajax({
           type:'post',
           url: '/check-subscriber-email',
           data:{email:email},
           success:function(response){
            if(response == "exist"){

                $("#statusSubscribe").show();
                 $("#btnSubmit").hide();
                $("#statusSubscribe").html("<span style='color:red;'>بريدك الالكتروني مسجل</span>");
            }else{
                $("#statusSubscribe").show();
                $("#statusSubscribe").html("<font style='color:green;'>تم تسجيل بريدك الالكتروني بنجاح</font>");
            }
           },
           error:function(response){
          //  alert('error');
           }
        });
    }

    function addSubscriber(){
        var email = $("#email").val();
        $.ajax({
           type:'post',
           url:'/add-subscriber-email',
           data:{email:email},
           success:function(response){
            if(response == "exist"){

                $("#statusSubscribe").show();
                 $("#btnSubmit").hide();
                 $("#statusSubscribe").html("<span style='color:red;'>بريدك الالكتروني مسجل</span>");
            }else if(response == "Enregistre"){
                $("#statusSubscribe").show();
                $("#statusSubscribe").html("<font style='color:green;'>تم تسجيل بريدك الالكتروني بنجاح</font>");
                
            }
           },
           error:function(response){
          //  alert('error');
           }
        });
    }

    function enableSubscriber(){
        $("#btnSubmit").show();
        $("#statusSubscribe").hide();
    }
</script>