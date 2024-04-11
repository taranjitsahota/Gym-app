@extends("layouts.layout")
@section("title","Register")
@section("content")

<section class="vh-100" style="background-color: #9A616D;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-xl-10">
          @if (session()->has("success"))
          <div class="alert alert-success">
             {{ session()->get("success") }}
          </div>
          @endif
          @if (session()->has("error"))
          <div class="alert alert-danger">
             {{ session()->get("error") }}
          </div>
          @endif
          <div class="card" style="border-radius: 1rem;">
            <div class="row g-0">
              <div class="col-md-6 col-lg-5 d-none d-md-block">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/img1.webp"
                  alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
              </div>
              <div class="col-md-6 col-lg-7 d-flex align-items-center">
                <div class="card-body p-4 p-lg-5 text-black">
  
                  <form id="user_form" method="POST" action="{{ route("register.post") }}">
                    @csrf
                    <div class="d-flex align-items-center mb-3 pb-1">
                      <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                      <span class="h1 fw-bold mb-0">Logo</span>
                    </div>
  
                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Register into your account</h5>

                    <div class="form-outline mb-4">
                        
                        <input type="text" value="{{ old('name') }}" name="name" id="name" class="form-control form-control-lg" />
                        <label class="form-label" for="form2Example17">FullName</label>
                        @if($errors->has('name'))
                           <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                        
                      </div>
                     
                      
  
                    <div class="form-outline mb-4">
                      <input type="text" name="email" value="{{ old('email') }}" id="email" class="form-control form-control-lg" />
                      <label class="form-label" for="form2Example17">Email address</label>
                      @if($errors->has('email'))
                      <span class="text-danger">{{ $errors->first('email') }}</span>
                   @endif
                    </div>
  
                    <div class="form-outline mb-4">
                      <input type="password" name="password" id="password" class="form-control form-control-lg" />
                      <label class="form-label" for="form2Example27">Password</label>
                      @if($errors->has('password'))
                      <span class="text-danger">{{ $errors->first('password') }}</span>
                   @endif
                    </div>
  
                    <div class="pt-1 mb-4">
                      <button class="btn btn-dark btn-lg btn-block" type="submit">Register</button>
                    </div>
  
                    
                    <p class="mb-5 pb-lg-2" style="color: #393f81;">Have an account? <a href="/login"
                        style="color: #393f81;">Login here</a></p>
                    <a href="#!" class="small text-muted">Terms of use.</a>
                    <a href="#!" class="small text-muted">Privacy policy</a>
                  </form>
  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"> </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"> </script>
  <script>
    $(document).ready(function() {
        $('#user_form').validate({
            rules: {
              name:{
                required: true
              },
              email: {
                    required: true
                },
                password: {
                    required: true
                },

            },
            messages: {
              name: 'Required',
              email: 'Required',
              password: 'Required'
             

            },
            submitHandler: function(form) {
                form.submit();
            }
        });
    });
</script>    


@endsection
{{-- @push('scripts')
<script>
  $(document).ready(function(){
      $('#user_form').on('click',function(e){
        var name = $('#name').val();
        var email = $('#email').val();
        var password = $('#password').val();
        var form = $(this).parents('form');
        console.log(form);
        e.preventDefault();
      });
  });
</script>
  
@endpush --}}


{{-- $(document).ready(function() {

  $("#data_form").on('submit', (function(e) {
      e.preventDefault();
      $(".form_error").html("");
      $(".form_error").removeClass("alert alert-danger");

      $.ajax({
          type: "POST",
          url: "{{ url('store_dietician') }}",
          data: new FormData(this),
          dataType: 'json',
          cache: false,
          contentType: false,
          processData: false,
          success: function(result) {
              location.href = "{{ url('dietician_list') }}";
          },
          error: function(data) {
              var responseData = data.responseJSON;
              if (responseData.error_type == 'form') {
                  jQuery.each(responseData.errors, function(i, val) {
                      $("#form-error-" + i).html(val);
                      $("#form-error-" + i).addClass(
                          'alert alert-danger');
                  });
              }
          }
      });

  }));

});  --}}