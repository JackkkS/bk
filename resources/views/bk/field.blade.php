<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <title>UTKSport</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

                <!-- Header -->
                <div class="container">
                    <header class="d-flex justify-content-center py-3">
                    <ul class="nav nav-pills">
                    <li class="nav-item"><a href="{{ route('index') }}" class="nav-link">หน้าแรก</a></li>
                        <li class="nav-item"><a href="{{ route('about') }}"class="nav-link" >เกี่ยวกับเรา</a></li>
                        <li class="nav-item"><a href="{{ route('contract') }}" class="nav-link">ติดต่อเรา</a></li>
                        <li class="nav-item"><a href="{{ route('reserve') }}" class="nav-link active" aria-current="page">จองสนามกีฬา</a></li>
                        <li class="nav-item"><a href="{{ route('rule') }}" class="nav-link">กฎของสนามกีฬา</a></li>
                    </ul>
                    </header>
                </div>     

                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <h3 class="text mt-4 mb-5">จองสนามกีฬา</h3>
                                </div>
                            </div>

                            @foreach($field_reserve as $row)
                            @if($row->field_status === 'เปิดใช้งาน')
                            <div class="card mb-4 bg-light" >
                                <div class="row no-gutters">
                                    <div class="col-md-4">
                                        <img src="{{asset($row->photo1)}}" alt="" class="card-img">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h3 class="card-title">ชื่อสนาม : {{$row ->field_name}}</h3>
                                            <div class="h3">
                                            <p class="card-text">ประเภทสนาม : {{$row ->field_type}}</p>
                                            <p class="card-text" style="color:#00ff00;">ราคา {{$row ->price}}บาท</p>
                                            </div>
                                            <br /><br /><br /><br /><br /><br /><br /><br /><br />
                                            <a style = "margin-left:680px;" href ="{{url('/detail/'.$row->field_id)}}" class="btn btn-info"><i class="glyphicon glyphicon-list"></i> ดูข้อมูลเพิ่มเติม</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @endforeach
                        </div>



        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>

  
</html>
