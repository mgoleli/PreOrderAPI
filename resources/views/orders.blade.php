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
  <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

</head>

<body class="antialiased">
<section class="vh-100" style="background-color: #eee;">
@if(session('success'))
              <div class="alert alert-success">
                {{ session('success') }}
              </div>
              @endif
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-12 col-xl-10">

        <div class="card">
          <div class="card-header p-3">
            <h5 class="mb-0"><i class="fas fa-tasks me-2"></i>Order List</h5>
          </div>
          <div class="card-body" data-mdb-perfect-scrollbar="true" style="position: relative; height: 400px">
          @if (auth()->check())
            <table class="table mb-0">
              <thead>
                <tr>
                  <th scope="col"></th>
                  <th scope="col">Ürün Adı</th>
                  <th scope="col">Adet</th>
                  <th scope="col">Ad</th>
                  <th scope="col">Soyad</th>
                  <th scope="col">Email</th>
                  <th scope="col">Telefon</th>
                  <th scope="col">Onay Durumu</th>
                </tr>
              </thead>
              <tbody>
                @foreach($orders as $order)
                @if ($order->durum !== 'approved')
                <tr class="fw-normal">
                  <th>
                  <img src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/E-commerce/Products/13.webp" class="img-fluid" style="width: 150px;" alt="Generic placeholder image">
                  </th>
                  <td class="align-middle">
                  <span class="ms-2">{{$order->product->urunAd}}</span>
                  </td>
                  <td class="align-middle">
                  <span class="ms-2">{{$order->adet}}</span>
                  </td>
                  <td class="align-middle">
                  <span class="ms-2">{{$order->ad}}</span>
                  </td>
                  <td class="align-middle">
                  <span class="ms-2">{{$order->soyad}}</span>
                  </td>
                  <td class="align-middle">
                  <span class="ms-2">{{$order->email}}</span>
                  </td>
                  <td class="align-middle">
                  <span class="ms-2">{{$order->telefon}}</span>
                  </td>
                  @if(auth()->user()->role_id  === 1) 
                  <td class="align-middle">
                  <form class="mb-5" action="{{ url('/orders', $order->id) }}" method="POST">
                  @csrf
                  @method('POST')
                  <button type="submit" class="btn btn-green btn-block btn-lg">Onayla</button>
                  </form>
                  <form action="{{ route('orders.destroy', $order->id) }}" method="POST" style="display: inline;">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-green btn-block btn-lg">Sil</button>
                  </td>
                  </form>
                 @else
                  <td class="align-middle">
                  <span class="ms-2">{{$order->durum}}</span>
                  </td>
                 @endif
                </tr>
              </tbody>
            @endif
            @endforeach
          @endif
            </table>

          </div>
        </div>

      </div>
    </div>
  </div>
</section>
</body>

</html>