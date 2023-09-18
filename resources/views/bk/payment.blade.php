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
                        <li class="nav-item"><a href="{{ route('reserve') }}" class="nav-link">จองสนามกีฬา</a></li>
                        <li class="nav-item"><a href="{{ route('rule') }}" class="nav-link">กฎของสนามกีฬา</a></li>
                    </ul>
                    </header>
                </div>     

                <div class = "container">
                    <div class="row">
                        <strong><h3>ชำระเงิน</h3></strong>
                    <div class="col-6">
                    <br /><br />
                    @if (session("success"))
                    <div class="alert alert-success">{{session("success")}}</div>
                    @endif
                    <div class="text-danger">กรุณาชำระเงินโดยทันที(ถ้าใน 15 นาทีไม่มีการชำระเงินผู้ดูแลระบบจะทำการยกเลิกการจองสนามกีฬา)</div>
                    <br />
                    <div class="container">
                        <div class="card">
                            <img src="{{ asset('img/bk/qr.jpeg') }}" />
                            <br /><br />
                            @php($total = 0)
                            @foreach($transaction as $row)
                            @php($price = $row->field->price)
                            @php($hour = $row->hour)
                            @php($subtotal = $price * $hour)
                            @endforeach
                            <h2>ยอดรวมทั้งสิ้น: {{ $subtotal }} บาท</h2>
                            <br /><br />
                                <div class="card-header">แนบหลักฐานการชำระเงิน</div>
                                <div class="card-body">

                                    <form action="{{url('/paid/'.$row->transaction_id)}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <lable for="payment">หลักฐานการชำระเงิน</lable>
                                            <input type="file" class="form-control" name="payment">
                                            @error('payment')
                                            <div class="alert alert-danger">{{$message}}</div>
                                            @enderror
                                          
                                        
                                        </div>
                                        
                                        </br >
                                        <input type="submit" onclick="return confirm('ยืนยันการแนบหลักฐาน ?')" value="ยืนยัน" class="btn btn-primary">
                                    </form>
                                </div>
                                </div>
                            </div>
                        </div>
                        
                        
                    </div>
                </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>

  
</html>
