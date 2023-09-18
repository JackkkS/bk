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
                    <header class="d-flex justify-content-center py-3 ">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a href="{{ route('index') }}" class="nav-link">หน้าแรก</a></li>
                        <li class="nav-item"><a href="{{ route('about') }}" class="nav-link active" aria-current="page">เกี่ยวกับเรา</a></li>
                        <li class="nav-item"><a href="{{ route('contract') }}" class="nav-link">ติดต่อเรา</a></li>
                        <li class="nav-item"><a href="{{ route('reserve') }}" class="nav-link">จองสนามกีฬา</a></li>
                        <li class="nav-item"><a href="{{ route('rule') }}" class="nav-link">กฎของสนามกีฬา</a></li>
                    </ul>
                    </header>
                </div>     
                <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <h3 class="text mt-4 mb-5">เกี่ยวกับเรา</h3>
                            </div>
                        </div>
                    <div class="card mb-4">
                        <div style = "margin-left:0;" class = "container">
                            <div class = "panel panel-default">
                                <div class = "panel-body">
                                    
                                    <p style = "position:relative; float:left; width:850px; margin:50px">
                                        ประวัติมหาวิทยาลัยเทคโนโลยีราชมงคลกรุงเทพ
                                        <br>ก่อตั้งเมื่อ 18 มกราคม 2548 มหาวิทยาลัยเทคโนโลยีราชมงคลกรุงเทพก่อตั้งขึ้นเมื่อวันที่ 18 มกราคม 2548 เป็นสถาบันอุดมศึกษาสายอาชีพเปิดสอนในระดับปริญญาตรีและปริญญาโทและมีรากฐานมาจากการหลอมรวมตัวกันของสถาบันการศึกษาสายอาชีพที่มีชื่อเสียงและประวัติศาสตร์มาอย่างยาวนาน 3 แห่งคือ สถาบันเทคโนโลยีราชมงคลวิทยาเขตพระนครใต้หรือการช่างสตรีพระนครใต้ มีชื่อเสียงในความเชี่ยวชาญด้านงานช่างสตรี อาทิ งานตัดเย็บเสื้อผ้าและออกแบบแฟชั่น งานประดิษฐ์และจัดดอกไม้ อาหารอาหารแปรรูป วิทยาศาสตร์การอาหาร ซึ่งมีประวัติศาสตร์มานานกว่า 80 ปี สถาบันเทคโนโลยีราชมงคลวิทยาเขตเทคนิคกรุงเทพฯหรือวิทยาลัยเทคนิคกรุงเทพฯ มีชื่อเสียงในความเชี่ยวชาญทางด้านช่างอุตสาหกรรม อาทิ อุตสาหกรรมบริการ การท่องเที่ยว การโรงแรม อุตสาหกรรมสิ่งทอ อุตสาหกรรมเครื่องเรือนวิศวกรรมไฟฟ้าและอิเล็กทรอนิกส์ เครื่องยนต์ เคมี ช่างสำรวจ ช่างภาพซึ่งมีประวัติศาสตร์มานานกว่า 60 ปี และ สถาบันเทคโนโลยีราชมงคลวิทยาเขตบพิตรพิมุข มหาเมฆ มีชื่อเสียงในความเชี่ยวชาญในด้านบริหารธุรกิจการตลาดและภาษาต่างประเทศโดยเฉพาะ ภาษาญี่ปุ่น ภาษาอังกฤษ ภาษาจีน ซึ่งมีประวัติศาสตร์มานานกว่า 30 ปี</p>                                                                        
                                    <img style = "float:right;" src="{{ asset('img/bk/about.jpg') }}" width = "250px" height = "250px" />                                        
                            </div>
                        </div>
                    </div>
                </div>
            </div>    

                <br />
                <br />              
                <footer class="bg-dark text-center text-white">
                    <!-- Grid container -->
                    <div class="container p-4 pb-0">
                        <!-- Section: Social media -->
                        <section class="mb-4">
                        <!-- Facebook -->
                        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-facebook"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                            <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                            </svg></i></a>

                        <!-- Twitter -->
                        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-twitter"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
                            <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
                            </svg></i></a>

                        <!-- Instagram -->
                        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-instagram"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                            <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
                            </svg></i></a>

                    
                        </section>
                        <!-- Section: Social media -->
                    </div>
                    <!-- Grid container -->

                    <!-- Copyright -->
                    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                        © 2023 Copyright:
                        <a class="text-white" >Sports and Recreation Office UTK</a>
                    </div>
                    <!-- Copyright -->
                </footer>             
            
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>

  
</html>