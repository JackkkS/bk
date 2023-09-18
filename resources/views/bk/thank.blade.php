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
                        <li class="nav-item"><a href="{{ route('about') }}" class="nav-link">เกี่ยวกับเรา</a></li>
                        <li class="nav-item"><a href="{{ route('contract') }}" class="nav-link">ติดต่อเรา</a></li>
                        <li class="nav-item"><a href="{{ route('reserve') }}" class="nav-link">จองสนามกีฬา</a></li>
                        <li class="nav-item"><a href="{{ route('rule') }}" class="nav-link">กฎของสนามกีฬา</a></li>
                    </ul>
                    </header>
                </div>     
                @if (session("success"))
                    <div class="alert alert-success">{{session("success")}}</div>
                @endif
                <div class="container">
                        <div class="row">
                            <div class="col-12">
                            <center> <h1 class="text-success mt-4 mb-5 ">การจองสำเร็จ</h1></center>
                            </div>
                        </div>
                        <div class="container">
                        <center> <div class="col-6">    
                    <div class="card mb-4 bg-light">
                    
                    <br /><br />
					<center><h2>ขอบคุณสำหรับการจอง</h2></center>
					<br />
					<center><h3>THANK YOU!</h3></center>
					<br />
					<center><a href = "{{ route('reserve') }}" class = "btn btn-success">กลับไปหน้าจองสนามกีฬา</a></center>
                    <br /><br />
				</div></center>
                </div>
		</div>
                

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>

  
</html>
