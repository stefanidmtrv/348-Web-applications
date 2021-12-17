<x-guest-layout>
    <x-auth-validation-errors class="mb-4" :errors="$errors" />
    
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
          <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
              <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                <div class="card" style="border-radius: 15px;">
                  <div class="card-body p-5">
                    <h2 class="text-uppercase text-center mb-5">Register</h2>
      
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                      <div class="form-outline mb-4">
                        <label class="form-label" for="name" :value="__('Name')">Name</label>
                        <input type="text" id="name" class="form-control form-control-lg" name="name" :value="old('name')"/>
                        
                      </div>

                      <div class="form-outline mb-4">
                        <label class="form-label" for="profile" :value="__('Username')">Username</label>
                        <input type="text" id="profile" class="form-control form-control-lg" name="profile" :value="old('profile')"/>
                        
                      </div>
      
                      <div class="form-outline mb-4">
                        <label class="form-label" for="email" :value="__('Email')">Email</label>
                        <input type="email" id="email" class="form-control form-control-lg" name="email" :value="old('email')" />
                        
                      </div>
      
                      <div class="form-outline mb-4">
                        <label class="form-label" for="password" :value="__('Password')">Password</label>
                        <input type="password" id="password" class="form-control form-control-lg" name="password" />
                      </div>
      
                      <div class="form-outline mb-4">
                        <label class="form-label" for="password-confirmation" :value="__('Confirm Password')">Confirm Password</label>
                        <input type="password" id="password_confirmation" class="form-control form-control-lg" name="password_confirmation" />
                      </div>
      
                      <div class="col-md-12 text-center">
                      <button class="btn btn-success">
                        {{ __('Register') }}
                    </button>
                  </div>
                      <p class="text-center text-muted mt-5 mb-0">Already have an account? <a href="{{ route('login') }}" class="fw-bold text-body"><u>Login here</u></a></p>
                      
                    </form>
      
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    
      
</x-guest-layout>
