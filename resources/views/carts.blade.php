<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.csss"></script>

  <title>Laravel</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    .qty .count {
      color: #000;
      display: inline-block;
      vertical-align: top;
      font-size: 25px;
      font-weight: 700;
      line-height: 30px;
      padding: 0 2px;
      min-width: 35px;
      text-align: center;
    }

    .qty .plus {
      cursor: pointer;
      display: inline-block;
      vertical-align: top;
      color: white;
      width: 30px;
      height: 30px;
      font: 30px/1 Arial, sans-serif;
      text-align: center;
      border-radius: 50%;
    }

    .qty .minus {
      cursor: pointer;
      display: inline-block;
      vertical-align: top;
      color: white;
      width: 30px;
      height: 30px;
      font: 30px/1 Arial, sans-serif;
      text-align: center;
      border-radius: 50%;
      background-clip: padding-box;
    }

    div {
      text-align: center;
    }

    .minus:hover {
      background-color: #717fe0 !important;
    }

    .plus:hover {
      background-color: #717fe0 !important;
    }

    /*Prevent text selection*/
    span {
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
    }

    input {
      width: 20%;
    }

    nput::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }

    input:disabled {
      background-color: white;
    }

    @media (min-width: 1025px) {
      .h-custom {
        height: 100vh !important;
      }
    }

    .number-input input[type="number"] {
      -webkit-appearance: textfield;
      -moz-appearance: textfield;
      appearance: textfield;
    }

    .number-input input[type=number]::-webkit-inner-spin-button,
    .number-input input[type=number]::-webkit-outer-spin-button {
      -webkit-appearance: none;
    }

    .number-input button {
      -webkit-appearance: none;
      background-color: transparent;
      border: none;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      margin: 0;
      position: relative;
    }

    .number-input button:before,
    .number-input button:after {
      display: inline-block;
      position: absolute;
      content: '';
      height: 2px;
      transform: translate(-50%, -50%);
    }

    .number-input button.plus:after {
      transform: translate(-50%, -50%) rotate(90deg);
    }

    .number-input input[type=number] {
      text-align: center;
    }

    .number-input.number-input {
      border: 1px solid #ced4da;
      width: 10rem;
      border-radius: .25rem;
    }

    .number-input.number-input button {
      width: 2.6rem;
      height: .7rem;
    }

    .number-input.number-input button.minus {
      padding-left: 10px;
    }

    .number-input.number-input button:before,
    .number-input.number-input button:after {
      width: .7rem;
      background-color: #495057;
    }

    .number-input.number-input input[type=number] {
      max-width: 4rem;
      padding: .5rem;
      border: 1px solid #ced4da;
      border-width: 0 1px;
      font-size: 1rem;
      height: 2rem;
      color: #495057;
    }

    @media not all and (min-resolution:.001dpcm) {
      @supports (-webkit-appearance: none) and (stroke-color:transparent) {

        .number-input.def-number-input.safari_only button:before,
        .number-input.def-number-input.safari_only button:after {
          margin-top: -.3rem;
        }
      }
    }

    .shopping-cart .def-number-input.number-input {
      border: none;
    }

    .shopping-cart .def-number-input.number-input input[type=number] {
      max-width: 2rem;
      border: none;
    }

    .shopping-cart .def-number-input.number-input input[type=number].black-text,
    .shopping-cart .def-number-input.number-input input.btn.btn-link[type=number],
    .shopping-cart .def-number-input.number-input input.md-toast-close-button[type=number]:hover,
    .shopping-cart .def-number-input.number-input input.md-toast-close-button[type=number]:focus {
      color: #212529 !important;
    }

    .shopping-cart .def-number-input.number-input button {
      width: 1rem;
    }

    .shopping-cart .def-number-input.number-input button:before,
    .shopping-cart .def-number-input.number-input button:after {
      width: .5rem;
    }

    .shopping-cart .def-number-input.number-input button.minus:before,
    .shopping-cart .def-number-input.number-input button.minus:after {
      background-color: #9e9e9e;
    }

    .shopping-cart .def-number-input.number-input button.plus:before,
    .shopping-cart .def-number-input.number-input button.plus:after {
      background-color: #4285f4;
    }
  </style>
</head>

<body class="antialiased">
  @if(session('success'))
  <div class="alert alert-success">
    {{ session('success') }}
  </div>
  @endif
  <section class="h-100 h-custom" style="background-color: #eee;">
    <div class="container h-100 py-5">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col">
          <div class="card shopping-cart" style="border-radius: 15px;">
            <div class="card-body text-black">
              <div class="row">
                <div class="col-lg-6 px-5 py-4">
                  <h3 class="mb-5 pt-2 text-center fw-bold text-uppercase">Ürünler</h3>

                  @foreach($carts as $cart)

                  <form class="mb-5 d-inline-block" action="{{ route('carts.destroy', $cart->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-primary"><i class="bi-trash"></i>Kaldır</button>
                  </form>
                  <form class="mb-5 d-inline-block" action="{{ route('carts.update', $cart->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="number" min="1" max= "{{$cart->product->urunMiktar}}" class="count" name="qty[{{$cart->id}}]" value="{{$cart->quantity}}">

                    <button type="submit" class="btn btn-primary"><i class="bi-trash"></i>Güncelle</button>
                  </form>
                  <form class="mb-5" action="{{ url('/carts') }}" method="POST">
                    @csrf
                    <div class="d-flex align-items-center mb-5">
                      <div class="flex-shrink-0">
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/E-commerce/Products/13.webp" class="img-fluid" style="width: 150px;" alt="Generic placeholder image">
                      </div>
                      <div class="flex-grow-1 ms-3">
                        <a href="#!" class="float-end text-black"><i class="fas fa-times"></i></a>
                        <input type="hidden" name="items[]" value="{{ $cart->product_id }}">
                        <h5 class="text-primary">{{$cart->product->urunAd}}</h5>
                        <h6 style="color: #9e9e9e;">Color: white</h6>
                        <div class="d-flex align-items-center">
                          <p class="fw-bold mb-0 me-5 pe-3">{{$cart->product->urunFiyat}} TL</p>

                        </div>
                      </div>
                    </div>


                    <hr class="mb-4" style="height: 2px; background-color: #1266f1; opacity: 1;">
                    <div class="d-flex justify-content-between p-2 mb-2" style="background-color: #e1f5fe;">
                    </div>
                    @endforeach

                </div>
                <div class="col-lg-6 px-5 py-4">

                  <h3 class="mb-5 pt-2 text-center fw-bold text-uppercase">Bilgiler</h3>

                  <div class="form-outline mb-5">
                    <label class="form-label" for="first_name">Ad</label>
                    <input type="text" name="first_name" class="form-control form-control-lg" siez="17" value="{{ old('first_name') }}" />
                    @error('first_name')
                    <span>{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="form-outline mb-5">
                    <label class="form-label" for="last_name">Soyad</label>
                    <input type="text" name="last_name" class="form-control form-control-lg" siez="17" value="{{ old('last_name') }}" minlength="19" maxlength="19" />
                    @error('last_name')
                    <span>{{ $message }}</span>
                    @enderror
                  </div>

                  <div class="form-outline mb-5">
                    <label class="form-label" for="email">Email</label>
                    <input type="email" name="email" class="form-control form-control-lg" siez="17" value="{{ old('email') }}" minlength="19" maxlength="19" />
                    @error('email')
                    <span>{{ $message }}</span>
                    @enderror
                  </div>

                  <div class="form-outline mb-5">
                    <label class="form-label" for="phone">Telefon</label>
                    <input type="text" name="phone" class="form-control form-control-lg" value="{{ old('phone') }}" />
                    @error('phone')
                    <span>{{ $message }}</span>
                    @enderror
                  </div>

                  <div class="alert alert-warning" role="alert">
                    Tüm Bilgiler Zorunludur!
                  </div>
                  <button type="submit" class="btn btn-primary btn-block btn-lg">Ön Sipariş</button>

                  </form>

                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script>

  </script>
</body>

</html>