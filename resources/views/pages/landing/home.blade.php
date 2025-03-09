@extends('layouts.master')

@section('content')

<div class="auth-main">
    <div class="auth-wrapper v3">
      <div class="auth-form">
        <div class="auth-header row">
          <div class="col my-1">
            {{-- <a href="#"><img src="../assets/images/logo-dark.svg" alt="img" /></a> --}}
            <h2>Govt High Secondary School No 1 Abbottabad</h2>
          </div>
          
          {{-- <div class="col-auto my-1">
            <h5 class="m-0 text-muted f-w-500">Step <b class="h5" id="auth-active-slide">1</b> to 5</h5>
          </div> --}}
        </div>
        <div class="card my-5">
          <div class="card-body">
          
            <div class="tab-content">
              <div class="tab-pane show active" id="auth-1" role="tabpanel" aria-labelledby="auth-tab-1">
                <div class="text-center">
                  <h3 class="text-center mb-3">Welcome to the School</h3>
                  <p class="mb-4">Login or Sign Up</p>
                  <div class="d-grid my-3">
                    <a href="{{ route('auth.login') }}" class="btn mt-2 btn-light-primary bg-light text-muted"><span> Login</span></a>
                    <a href="{{ route('auth.register') }}" class="btn mt-2 btn-light-primary bg-light text-muted"><span> Sign Up</span></a>
                  </div>
                </div>
              </div>
             
            </div>
          </div>
        </div>
        <div class="auth-footer">
          <p class="m-0 w-100 text-center"
            >By signing up, you confirm to have read School Management System <a href="#">Privacy Policy</a> and agree to the
            <a href="#">Terms of Service</a>.</p
          >
        </div>
      </div>
      <div class="auth-sidecontent">
        <div class="p-3 px-lg-5 text-center">
          <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="../assets/images/user/avatar-1.jpg" alt="user-image" class="user-avtar wid-50 rounded-circle mb-3" />
                <h5 class="text-white mb-0">Saqib Din</h5>
                <p class="text-white text-opacity-50">din.97legend@gmail.com</p>
                <div class="star f-20 my-4">
                  <i class="fas fa-star text-warning"></i>
                  <i class="fas fa-star text-warning"></i>
                  <i class="fas fa-star text-warning"></i>
                  <i class="fas fa-star text-warning"></i>
                  <i class="fas fa-star-half-alt text-warning"></i>
                </div>
                <p class="text-white"
                  >Very good customer service!👌 I liked the design and there was nothing wrong, but found out after testing that it did
                  not quite match the functionality and overall design that I needed for my type of software. I therefore contacted
                  customer service and it was no problem even though the deadline for refund had actually expired.😍</p
                >
              </div>
              <div class="carousel-item">
                <img src="../assets/images/user/avatar-1.jpg" alt="user-image" class="user-avtar wid-50 rounded-circle mb-3" />
                <h5 class="text-white mb-0">Saqib Din</h5>
                <p class="text-white text-opacity-50">din.97legend@gmail.com</p>
                <div class="star f-20 my-4">
                  <i class="fas fa-star text-warning"></i>
                  <i class="fas fa-star text-warning"></i>
                  <i class="fas fa-star text-warning"></i>
                  <i class="fas fa-star text-warning"></i>
                  <i class="fas fa-star-half-alt text-warning"></i>
                </div>
                <p class="text-white"
                  >Very good customer service!👌 I liked the design and there was nothing wrong, but found out after testing that it did
                  not quite match the functionality and overall design that I needed for my type of software. I therefore contacted
                  customer service and it was no problem even though the deadline for refund had actually expired.😍</p
                >
              </div>
              <div class="carousel-item">
                <img src="../assets/images/user/avatar-1.jpg" alt="user-image" class="user-avtar wid-50 rounded-circle mb-3" />
                <h5 class="text-white mb-0">Saqib Din</h5>
                <p class="text-white text-opacity-50">din.97legend@gmail.com</p>
                <div class="star f-20 my-4">
                  <i class="fas fa-star text-warning"></i>
                  <i class="fas fa-star text-warning"></i>
                  <i class="fas fa-star text-warning"></i>
                  <i class="fas fa-star text-warning"></i>
                  <i class="fas fa-star-half-alt text-warning"></i>
                </div>
                <p class="text-white"
                  >Very good customer service!👌 I liked the design and there was nothing wrong, but found out after testing that it did
                  not quite match the functionality and overall design that I needed for my type of software. I therefore contacted
                  customer service and it was no problem even though the deadline for refund had actually expired.😍</p
                >
              </div>
              <div class="carousel-item">
                <img src="../assets/images/user/avatar-4.jpg" alt="user-image" class="user-avtar wid-50 rounded-circle mb-3" />
                <h5 class="text-white mb-0">Saqib Din</h5>
                <p class="text-white text-opacity-50">din.97legend@gmail.com</p>
                <div class="star f-20 my-4">
                  <i class="fas fa-star text-warning"></i>
                  <i class="fas fa-star text-warning"></i>
                  <i class="fas fa-star text-warning"></i>
                  <i class="fas fa-star text-warning"></i>
                  <i class="fas fa-star-half-alt text-warning"></i>
                </div>
                <p class="text-white"
                  >Very good customer service!👌 I liked the design and there was nothing wrong, but found out after testing that it did
                  not quite match the functionality and overall design that I needed for my type of software. I therefore contacted
                  customer service and it was no problem even though the deadline for refund had actually expired.😍</p
                >
              </div>
              <div class="carousel-item">
                <img src="../assets/images/user/avatar-1.jpg" alt="user-image" class="user-avtar wid-50 rounded-circle mb-3" />
                <h5 class="text-white mb-0">Saqib Din</h5>
                <p class="text-white text-opacity-50">din.97legend@gmail.com</p>
                <div class="star f-20 my-4">
                  <i class="fas fa-star text-warning"></i>
                  <i class="fas fa-star text-warning"></i>
                  <i class="fas fa-star text-warning"></i>
                  <i class="fas fa-star text-warning"></i>
                  <i class="fas fa-star-half-alt text-warning"></i>
                </div>
                <p class="text-white"
                  >Very good customer service!👌 I liked the design and there was nothing wrong, but found out after testing that it did
                  not quite match the functionality and overall design that I needed for my type of software. I therefore contacted
                  customer service and it was no problem even though the deadline for refund had actually expired.😍</p
                >
              </div>
            </div>
            <div class="carousel-indicators position-relative mt-3">
              <button
                type="button"
                data-bs-target="#carouselExampleIndicators"
                data-bs-slide-to="0"
                class="active"
                aria-current="true"
                aria-label="Slide 1"
              ></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" aria-label="Slide 5"></button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection