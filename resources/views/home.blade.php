@include('header')
  <div class="col-md-8 col-lg-4 col-xxl-3">
    <div class="card mb-0">
      <div class="card-body">
        <a href="/" class="text-nowrap logo-img text-center d-block py-3 w-100">  
            <img src="/favicon.png" alt=""> 
            <h2 class="fw-bolder mt-2">{{ getenv('APP_NAME') }}</h1>
        </a>
        <p class="fw-bolder text-center">Authentication System</p>
        <div class="alert alert-warning" id="warningMsg" style="display: none;"><span class="fw-bolder">Warning!</span> All fields are required.</div>
        <div class="alert alert-success" id="successMsg" style="display: none;"><span class="fw-bolder">Success!</span> You are now logged in. </div>

        <form id="loginForm">
          <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" aria-describedby="username">
          </div>
          @csrf
          <div class="mb-4">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password">
          </div>
          
          <button type="submit" id="btnlogin" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Sign In</button>
        </form>

        <script>
          $(document).ready(function() {
            $('#loginForm').submit(function(e) {
              e.preventDefault();

              var username = $('#username').val();
              var password = $('#password').val();
              var token = $('input[name="_token"]').val();

              $('#btnlogin').html('Processing...');
              $('#btnlogin').addClass('disabled', true);

              if (username === '' || password === '' || token == '') {
                $('#warningMsg').text('All fields are required.').show();
                $('#successMsg').hide();
                $('#btnlogin').html('Sign In');
                $('#btnlogin').removeClass('disabled', true)
              } else {

                var formData = {
                  username: username,
                  password: password,
                  _token: token
                };

                $.ajax({
                  type: 'POST',
                  url: "{{ route('home.login') }}",
                  dataType: 'json',
                  data: formData,
                  success: function(response) {
                    
                    if (response.code == '200') {
                      $('#successMsg').show();
                      $('#warningMsg').hide();
                      setTimeout(function() {
                        window.location.href = "{{ route('user.dashboard') }}";
                      }, 2000);
                      
                    } 
                    else if(response.code == '419') {
                      $('#successMsg').hide();
                      $('#warningMsg').text('Something went wrong.').show();
                      $('#btnlogin').html('Sign In');
                      $('#btnlogin').removeClass('disabled', true)
                    }

                  }
                });
              }
            });
          });
        </script>
      </div>
    </div>
  </div>
@include('footer')