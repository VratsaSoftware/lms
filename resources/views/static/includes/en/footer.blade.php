<link rel="stylesheet" href="{{asset('/css/footer.css')}}">
<div class="footer col-md-12 flex-row justify-content-between d-flex flex-wrap text-center">
    <div class="p-2 col-md-3">
        <div class="col-md-12 f-heading">
            About
        </div>
        <div class="col-md-12">
            <p><a href="{{route('mission')}}">Mission</a></p>
            <p><a href="{{route('about')}}">Team</a></p>
            <p><a href="{{route('year_reports')}}">Annual reports</a></p>
        </div>
    </div>

    <div class="p-2 col-md-3">
        <div class="col-md-12 f-heading">
            Courses
        </div>
        <div class="col-md-12">
            <p><a href="{{route('programmingCourses')}}">Programming</a></p>
            <p><a href="{{route('digitalMarketing')}}">Digital Marketing</a></p>
        </div>
    </div>

    <div class="p-2 col-md-3">
        <div class="col-md-12 f-heading">
            Contacts
        </div>
        <div class="col-md-12 f-contacts">
            <p><i class="far fa-envelope"></i><br/><a href="mailto:school@vratsasoftware.com">school@vratsasoftware.com</a></p>
            <p><i class="fab fa-facebook-square"></i><br/><a href="https://www.facebook.com/vratsasoftware/">vratsasoftware</a></p>
            <p><i class="fas fa-phone"></i><br/><a href="tel:+359 88 207 6174">+359 88 207 6174</a></p>
        </div>
    </div>

    <div class="col-md-12 text-center">
        General partner for the period 2017-{{\Carbon\Carbon::now()->format('Y')}} is foundation America for Bulgaria.
    </div>
</div>
<div class="footer-end col-md-12 d-flex flex-row flex-wrap">
    <div class="col-md-6">
        <p>Subscribe for our newsletter, by e-mail:</p>
        <p>Vratsa Software &copy; {{\Carbon\Carbon::now()->format('Y')}}</p>
    </div>
    <div class="col-md-6 text-center">
        <input type="text" name="subscribe" value="" placeholder="example@gmail.com" id="subscribe" name="subscribe"> <button type="button" name="button" class="send-subscribe" id="subscribe-btn" data-url="{!! url('/') !!}">Subscribe</button>
    </div>
</div>

<script type="text/javascript">
    $('#subscribe-btn').on('click',function(){
        var url = $(this).attr('data-url');
        var email = $('#subscribe').val();
        if(email.length > 2){
            $.ajax( {
                headers: {
                    'X-CSRF-TOKEN': $( 'meta[name="csrf-token"]' ).attr( 'content' )
                },
                type: "get",
                async:true,
                url: url+'/subscribe/'+email,
                success: function(data){
                    $('#subscribe').css('background','#fff');
                    $('#subscribe').css('border','');
                    $('#subscribe').val('');
                    $('#subscribe').attr("disabled", 'disabled');
                    $('#subscribe-btn').hide('fast');
                    $('#subscribe').parent().append('<span class="alert alert-success" id="subscribed">subscribed</span>');
                    setTimeout(function () {
                        $('#subscribed').hide();
                        $('#subscribe-btn').show();
                        $('#subscribe').prop("disabled", false);
                    }, 5000);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    $('#subscribe').css('border','1px solid #f00');
                    $('#subscribe').css('background','#f00');
                }
            });
        }
    });

    $('#subscribe').on('keyup',function(e){
        if($(this).val().length < 1){
            $(this).css('background','#fff');
            $('#subscribe').css('border','');
        }

        if(e.keyCode==13){
            $('#subscribe-btn').click();
        }
    });
</script>
