<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet" type="text/css">
    <style>
      li{
        margin: 10px 0;
      }
      a{
        text-decoration: none;
      }
    </style>
    <title>SKD: Logi</title>
  </head>
  <body>
    <div class="container-flex d-flex">
        <sidebar class="sidebar bg-dark text-white" style="min-height: 100vh; width: 250px;">
          <div class="text-center pt-2 px-2">
            <h2>SCD</h2>
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
                    <h2>Logi</h2>
                    <a class = "btn btn-info btn-sm mx-3" href="/new-user">rejestracja karty</a>
                </div>
                <div class="table-conatiner">
                    <!-- begin::table -->
                    <table class="table">
                        <!-- begin::table-head-->
                        <thead>
                          <!-- begin::table-head-row-->
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">User_id</th>
                            <th scope="col">Data</th>
                            <th scope="col">Typ akcji</th>
                            <th scope="col">Status</th>
                            
                          </tr>
                          <!-- end::table-head-row-->
                        </thead>
                        <!-- end::table-head-->
                        <!-- begin::table-body-->
                        <tbody>
                        @if(is_array($logs)):
                          @foreach($logs as $log)
                            @php
                              if($log['action'] == 1):
                                $action = "Rozpoczęcie pracy";
                              elseif($log['action'] == 2):
                                $action = "Zakończenie pracy";
                              elseif($log['action'] == 3):
                                $action = "Wejście do sali konferencyjnej";
                              elseif($log['action'] == 4):
                                $action = "Wyjście z sali konferencyjnej";
                              endif;

                              if(is_null($log['user_id'])):
                                $user_id="Brak";
                              else:
                                $user_id=$log['user_id'];
                            @endphp
                            <!-- begin::table-row-->  
                            <tr>
                              <!-- begin::id-row -->
                              <th scope="row">{{$log['id']}}</th>
                              <!-- end::id-row -->
                              <td>{{$log['user_id']}}</td>
                              <td>{{$log['timestamp']}}</td>
                              <td>{{$action}}</td>
                              <td>{{$log['status']}}/td>
                            </tr>
                            <!-- end::table-row-->      
                            @endforeach
                          @endif
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