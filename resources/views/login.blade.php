@include('template.header')
<main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg"
        style="background-image: url('https://img.freepik.com/premium-photo/blurred-bookshelf-library-room_1484-1953.jpg?w=740">
        <span class="mask bg-gradient-dark opacity-6"></span>
        <div class="container">
            <div class="row justify-content-center">
                {{-- <div class="center"> <img src="https://i.ibb.co/7p6KSZS/20505089-removebg-preview.png"></div> --}}
                <div class="col-lg-5 text-center mx-auto"><img src="https://i.ibb.co/7p6KSZS/20505089-removebg-preview.png">
                    {{-- <h1 class="text-white mb-2 mt-5">SIP SMP Negeri 4 Tuban</h1> --}}
                </div>
            </div>
        </div>
    </div>
    <div class="container">
      <div class="row mt-lg-n10 mt-md-n11 mt-n10 justify-content-center">
        <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
          <div class="card z-index-0">
            
                  @if(session()->has('success'))
                      <div class="alert alert-success alert-dismissable fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        </button>
                      </div>
                  @endif
            
                  @if(session()->has('loginError'))
                      <div class="alert alert-danger alert-dismissable fade show text-center" role="alert">
                        {{ session('loginError') }}
                        {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        </button> --}}
                      </div>
                  @endif

                    <div class="card-header text-center pt-4">
                        <h5>Login</h5>
                    </div>
                    <div class="card-body bg-primary">
                        <form action="/" method="POST">
                            @csrf
                            <div class="mb-3">
                                <input type="email" name="email"
                                    class="form-control @error('email') is-invalid @enderror" placeholder="Email"
                                    aria-label="Email" required value="{{ old('email') }}">
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <input type="password" name="password"
                                    class="form-control @error('password') is-invalid @enderror" placeholder="Password"
                                    aria-label="Password" required>
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            {{-- <div class="mb-3">
                                <input type="text" name="level"
                                    class="form-control @error('level') is-invalid @enderror" placeholder="Level"
                                    aria-label="Name" required value="{{ old('level') }}">
                                @error('level')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div> --}}
                            <div class="text-center">
                                <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">LOGIN</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
