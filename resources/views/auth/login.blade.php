<x-guest-layout>
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <x-auth-validation-errors class="mb-4" :errors="$errors" />
    <div class="container my-3">
    <div class="mask d-flex align-items-center h-100 gradient-custom-3">
        <div class="container h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-9 col-lg-7 col-xl-6">
              <div class="card" style="border-radius: 15px;">
                <div class="card-body p-5">
                  <h2 class="text-uppercase text-center mb-5">Log In</h2>
    
                  <form method="POST" action="{{ route('login') }}">
                      @csrf
                    
    
                    <div class="form-outline mb-4">
                      <label class="form-label" for="email" :value="__('Email')">Email</label>
                      <input type="email" id="email" class="form-control form-control-lg" name="email" :value="old('email')" />
                      
                    </div>
    
                    <div class="form-outline mb-4">
                      <label class="form-label" for="password" :value="__('Password')">Password</label>
                      <input type="password" id="password" class="form-control form-control-lg" name="password" />
                    </div>

                    <div class="col-md-12 text-center">
                    <button class="btn btn-success">
                        {{ __('Log in') }}
                    </button>
                    </div>

                  </form>
    
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</x-guest-layout>
