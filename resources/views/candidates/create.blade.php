<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</head>
<body>

    <nav class="navbar navbar-expand-lg bg-dark">
        <div class="container-fluid ">
          <a class="navbar-brand text-light" href="/">Registrations</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon "></span>
          </button>
          </div>
        </div>
      </nav>
    
      @if ($message = Session::get('success'))
          <div class="alert alert-success alert-block">
          <strong>{{ $message }}</strong>
            </div>    
      
          
      @endif

    <form class="row p-4" method="POST" enctype="multipart/form-data" action="/candidates/store" >
        @csrf
        <div class="col-md-6 ">
          <label for="name" class="form-label">Name</label>
          <input type="text" value="{{ old('name') }}" class="form-control" name="name" id="user_name" placeholder="Please Enter Your Name">
          @if($errors->has('name'))
          <span class="text-danger">{{ $errors->first('name') }}</span>
          @endif
        </div>
        <div class="col-md-6 ">
          <label for="addrress" class="form-label">Addrress</label>
          <input type="text" value="{{ old('address') }}" class="form-control" name="address" id="user_address" placeholder="Flat No./Floor No./apartment">
          @if($errors->has('address'))
          <span class="text-danger">{{ $errors->first('address') }}</span>
          @endif
        </div>

        <div class="col-md-4 p-2">
          <label for="country" class="form-label">Country</label>
          <select name="country" id="country-dd" class="form-select">
            
            <option value="{{ old('country') }}" selected disabled >Choose...</option>

        
            @foreach ($countries as $data)
                 <option value="{{$data->id}}">
                    {{$data->name}}
                  </option>
             @endforeach



            {{-- <option>...</option> --}}
          </select>
          @if($errors->has('country'))
          <span class="text-danger">{{ $errors->first('country') }}</span>
          @endif
        </div>

        {{-- <div class="form-group mb-3">
          <select id="state-dd" class="form-control">
            <option value="">Select State</option>
          </select>
        </div>
        <div class="form-group">
          <select id="city-dd" class="form-control">
            <option value="">Select City</option>
          </select> --}}

        <div class="col-md-4 p-2">
            <label for="state" class="form-label">State</label>
            <select name="state" id="state-dd" class="form-select">
              <option value="{{ old('state') }}" selected disabled >Choose...</option>
              {{-- <option>...</option> --}}
            </select>
            @if($errors->has('state'))
            <span class="text-danger">{{ $errors->first('state') }}</span>
            @endif
          </div>
          <div class="col-md-4 p-2">
            <label for="city" class="form-label">City</label>
            <select name="city" id="city-dd" class="form-select">
              <option value=""selected disabled >Choose...</option>
              {{-- <option>...</option> --}}
            </select>
            @if($errors->has('city'))
          <span class="text-danger">{{ $errors->first('city') }}</span>
          @endif
          </div>
          <label for="gender">Gender:</label>
          <div>
            <div class="form-check p-2">
            <input class="form-check-input p-2" value="male"  type="radio" name="gender">
            <label class="form-check-label" for="user_gender">
              Male
            </label>
          </div>
          <div class="form-check p-2">
            <input class="form-check-input p-2" value="female" type="radio" name="gender">
            <label class="form-check-label" for="user_gender">
              Female
            </label>
          </div>
          @if($errors->has('gender'))
          <span class="text-danger">{{ $errors->first('gender') }}</span>
          @endif
        </div>
        <div class="col-6 p-2">
          <label for="number" class="form-label">Contact Number:</label>
          <input type="text" class="form-control" value="{{ old('number') }}" name="number" id="user_number" placeholder="Enter Ten digits Number" >
          @if($errors->has('number'))
          <span class="text-danger">{{ $errors->first('number') }}</span>
          @endif
        </div>
        <div class="col-6 ">
          <label for="age" class="form-label">Age</label>
          <input type="text" class="form-control" name="age" value="{{ old('age') }}" id="user_age" placeholder="Enter Age">
          @if($errors->has('age'))
          <span class="text-danger">{{ $errors->first('age') }}</span>
          @endif
        </div>
        <div class="input-group mb-3 p-2">
            <input type="file" class="form-control" value="{{ old('file') }}" name="file" id="User_file">
            <label class="input-group-text" for="file">Upload</label>
            @if($errors->has('file'))
          <span class="text-danger">{{ $errors->first('file') }}</span>
          @endif
          </div>
       
          <div class="col-md-5 p-2 ">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" value="{{ old('email') }}" name="email" id="user_email" placeholder="Enter Email">
            @if($errors->has('email'))
          <span class="text-danger">{{ $errors->first('email') }}</span>
          @endif
          </div>
          <div class="col-md-5 p-2">
            <label for="password" class="form-label">Password (Min=8,Uppercase & Lowercase)</label>
            <input type="password" class="form-control"  name="password" id="user_password" placeholder="Enter Password">
            @if($errors->has('password'))
          <span class="text-danger">{{ $errors->first('password') }}</span>
          @endif
          </div>
        
        <div class="col-12 p-2">
        
        <button type="submit" class="btn btn-dark mt-2" >Sign in</button>
  
        </div>
      </form>

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#country-dd').on('change', function () {
                var idCountry = this.value;
                $("#state-dd").html('');
                $.ajax({
                    url: "{{url('api/fetch-states')}}",
                    type: "POST",
                    data: {
                        country_id: idCountry,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#state-dd').html('<option value="">Select State</option>');
                        $.each(result.states, function (key, value) {
                            $("#state-dd").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                        $('#city-dd').html('<option value="">Select City</option>');
                    }
                });
            });
            $('#state-dd').on('change', function () {
                var idState = this.value;
                $("#city-dd").html('');
                $.ajax({
                    url: "{{url('api/fetch-cities')}}",
                    type: "POST",
                    data: {
                        state_id: idState,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (res) {
                        $('#city-dd').html('<option value="">Select City</option>');
                        $.each(res.cities, function (key, value) {
                            $("#city-dd").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                    }
                });
            });
        });
    </script>

    
</body>
</html>