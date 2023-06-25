<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

        input,
        textarea {
            border: 1px solid #eeeeee;
            box-sizing: border-box;
            margin: 0;
            outline: none;
            padding: 10px;
        }

        input[type="button"] {
            -webkit-appearance: button;
            cursor: pointer;
        }

        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
        }

        .input-group {
            clear: both;
            margin: 15px 0;
            position: relative;
        }

        .input-group input[type='button'] {
            background-color: #eeeeee;
            min-width: 38px;
            width: auto;
            transition: all 300ms ease;
        }

        .input-group .button-minus,
        .input-group .button-plus {
            font-weight: bold;
            height: 38px;
            padding: 0;
            width: 38px;
            position: relative;
        }

        .input-group .quantity-field {
            position: relative;
            height: 38px;
            left: -6px;
            text-align: center;
            width: 62px;
            display: inline-block;
            font-size: 13px;
            margin: 0 0 5px;
            resize: vertical;
        }

        .button-plus {
            left: -13px;
        }

        input[type="number"] {
            -moz-appearance: textfield;
            -webkit-appearance: none;
        }
    </style>
</head>

<body class="antialiased">
    <section style="background-color: #eee;">
        <div class="container py-5">
            <div class="row">
                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                    <a href="{{ url('/carts') }}">Sepete Gitmek İçin Tıklayın </a>
                </div>
                @endif
                @if(session('error'))
                <div class="alert alert-success">
                    {{ session('error') }}
                    <a href="{{ url('/login') }}">Üye Olmak İçin Tıklayın </a>
                </div>
                @endif
                <form action="{{ url('/products') }}" method="POST">
                    @csrf
                    @foreach ($products as $product)
                    <div class="col-md-12 col-lg-4 mb-4 mb-lg-0">
                        <div class="card">
                            <div class="d-flex justify-content-between p-3">
                                <p class="lead mb-0">Günün Teklifi</p>
                                <div class="bg-info rounded-circle d-flex align-items-center justify-content-center shadow-1-strong" style="width: 35px; height: 35px;">
                                    <p class="text-white mb-0 small">x4</p>
                                </div>
                            </div>
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/E-commerce/Products/13.webp" class="card-img-top" alt="Laptop" />
                            <div class="card-body">
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <div class="d-flex justify-content-between">
                                    <p class="small"><a href="#!" class="text-muted">Telefon</a></p>
                                    <p class="small text-danger"><s>$1099</s></p>
                                </div>

                                <div class="d-flex justify-content-between mb-3">
                                    <h5 class="mb-0">{{$product->urunAd}}</h5>
                                    <h5 class="text-dark mb-0">{{$product->urunFiyat}}</h5>
                                </div>
                                <div class="input-group">
                                    <input type="button" value="-" class="button-minus" data-field="quantity">
                                    <input type="number" min="1" max="{{$product->urunMiktar}}" value="1" name="quantity" class="quantity-field">
                                    <input type="button" value="+" class="button-plus" data-field="quantity">
                                </div>

                                <div class="d-flex justify-content-between mb-2">
                                    <p class="text-muted mb-0">Uygun: <span class="fw-bold">{{$product->urunMiktar}}</span></p>
                                    <div class="ms-auto text-warning">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-danger flex-fill ms-1">Sepete Ekle</button>
                        </div>
                    </div>
                    @endforeach
                </form>
            </div>
        </div>
    </section>

    <script>
        function incrementValue(e) {
            e.preventDefault();
            var fieldName = $(e.target).data('field');
            var parent = $(e.target).closest('div');
            var currentVal = parseInt(parent.find('input[name=' + fieldName + ']').val(), 10);

            if (!isNaN(currentVal)) {
                parent.find('input[name=' + fieldName + ']').val(currentVal + 1);
            } else {
                parent.find('input[name=' + fieldName + ']').val(0);
            }
        }

        function decrementValue(e) {
            e.preventDefault();
            var fieldName = $(e.target).data('field');
            var parent = $(e.target).closest('div');
            var currentVal = parseInt(parent.find('input[name=' + fieldName + ']').val(), 10);

            if (!isNaN(currentVal) && currentVal > 0) {
                parent.find('input[name=' + fieldName + ']').val(currentVal - 1);
            } else {
                parent.find('input[name=' + fieldName + ']').val(0);
            }
        }

        $('.input-group').on('click', '.button-plus', function(e) {
            incrementValue(e);
        });

        $('.input-group').on('click', '.button-minus', function(e) {
            decrementValue(e);
        });
    </script>
</body>

</html>