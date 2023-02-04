<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">

    <style>
      li{
        margin: 10px 0;
      }
      a{
        text-decoration: none;
      }
    </style>
<title>SCD: rejestr główny</title>
  </head>
  <body>
    <div class="container-flex d-flex">
        <sidebar class="sidebar bg-dark text-white" style="min-height: 100vh; width: 250px;">
        <div class="text-center pt-2 px-2">
          <h2>SKD</h2>
          <hr>
        </div>    

            <ul>
                <li>
                    <a href="/" class="text-white">
                        Rejestr główny
                    </a>
                </li>
                <li>
                    <a href="/logs" class="text-white">
                        Logi
                    </a>
                </li>
            </ul>
        </sidebar>
        <div class="container-flex w-100">
            <main class="px-5 mx-5">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
                <div class="table-heading my-5">
                    <h2>Rejestr główny</h2>
                    <a class = "btn btn-secondary btn-sm text-white mt-3" href="/new-user">rejestracja karty</a>
                </div>
                <div class="table-conatiner">
                    <!-- begin::table -->
                    <table class="table">
                        <!-- begin::table-head-->
                        <thead>
                          <!-- begin::table-head-row-->
                          <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Imię</th>
                            <th scope="col">Nazwisko</th>
                            <th scope="col">Numer karty</th>
                            <th scope="col">Status</th>
                            <th scope="col">Akcje</th>
                          </tr>
                          <!-- end::table-head-row-->
                        </thead>
                        <!-- end::table-head-->
                        <!-- begin::table-body-->
                        <tbody>
                        @foreach ($users as $user)
                          <!-- begin::table-row-->  
                          <tr>
                            <!-- begin::id-row -->
                            <th scope="row">{{$user['id']}}</th>
                            <!-- end::id-row -->
                            <td>{{$user['f_name']}}</td>
                            <td>{{$user['l_name']}}</td>
                            <td>{{$user['code']}}</td>
                            <td>Online</td>
                            <td class = "d-flex">
                                <a class = "btn btn-primary btn-sm ms-1" href="/user/{{$user['id']}}">Podgląd</a>
                                <a class = "btn btn-primary btn-sm ms-1" href="/edit-user/{{$user['id']}}">Edycja</a>
                                <form method="get" action="/delete-user/{{$user['id']}}">
                                  @csrf
                                  <button type="submit" class="btn btn-danger btn-sm ms-1">Usuń</button>
                                </form>
                            </td>
                          </tr>
                          <!-- end::table-row-->      
                          @endforeach
                        </tbody>
                        <!-- end::table-body-->
                      </table>
                      <!-- end::table -->
                </div>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>