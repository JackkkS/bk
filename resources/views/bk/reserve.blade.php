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
                <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-label="Slide 1" aria-current="true"></button>
                        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2" class=""></button>
                        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3" class=""></button>
                        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="3" aria-label="Slide 4" class=""></button>
                    </div>
                    <div class="carousel-inner">
                    <div class="carousel-item active">
                    <img src="{{asset($detail->photo1)}}" style = "width:100%; height:1000px;">
                        <div class="container">
                        <div class="carousel-caption text-start"></div>
                        </div>
                    </div>
                    
                    <div class="carousel-item">
                    <img src="{{asset($detail->photo2)}}" style = "width:100%; height:1000px;">
                        <div class="container">
                        <div class="carousel-caption"></div>
                        </div>
                    </div>
                    
                    <div class="carousel-item">
                    <img src="{{asset($detail->photo3)}}"style = "width:100%; height:1000px;">
                        <div class="container">
                        <div class="carousel-caption text-end"></div>
                        </div>
                    </div>

                    <div class="carousel-item">
                    <img src="{{asset($detail->photo4)}}" style = "width:100%; height:1000px;">
                        <div class="container">
                        <div class="carousel-caption text-end"></div>
                        </div>
                    </div>
                    </div>
                
                    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev" >
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    </button>
                </div>
                </div>
                <br />
                <br />
                <div class="container">
                    <div class="card bg-light">
                        <br />
                        <div class="content ms-5">
                            <strong><h1>ชื่อสนาม : {{($detail->field_name)}} </h1></strong>
                            <strong><h2>ราคา/ชั่วโมง {{($detail->price)}} บาท</h2></strong>
                            <br />
                                <strong><h3>บริการและสิ่งอำนวยความสะดวกของสนามกีฬา</h3></strong>
                                                <ul>
                                                    <li><label>เคาน์เตอร์ข้อมูล</label></li>
                                                    <li><label>ล็อกเกอร์เก็บของ</label></li>
                                                    <li><label>อินเตอร์เน็ตไร้สาย</label></li>
                                                    <li><label>ห้องน้ำ</label></li>
                                                    <li><label>First-Aid Room (Ticket Center)</label></li>
                                                    <li><label>ห้องละหมาด สำหรับผู้มาเยือนที่เป็นชาวมุสลิม</label></li>
                                                    <li><label>อุปการณ์กีฬา</label></li>
                                                    <li><label>ห้องเปลี่ยนเสื้อผ้าและอาบน้ำ</label></li>
                                                    <li><label>น้ำดื่ม</label></li>
                                                    <li><label>ร้านค้าและเครื่องดื่ม</label></li>
                                                </ul>
                        </div>                        
                        </div>
                </div>
                    <br />
                    <br />
                    <div class="col-8">
                    
                    @if (session("error"))
                    <div class="alert alert-danger">{{session("error")}}</div>
                    @endif
                    <div class="container">
                        <div class="card">
                                <div class="card-header">จองสนามกีฬา</div>
                                <div class="card-body">
                                    <form action="{{url('/detail/add/'.$detail->field_id)}}" method="post" >
                                        @csrf
                                        
                                        <div class="form-group">
                                            <div class="col-4">
                                                <lable for="firstname">ชื่อ</lable>
                                                <input type="text" class="form-control" name="firstname">
                                                @error('firstname')
                                                <div class="alert alert-danger">{{$message}}</div>
                                                @enderror
                                                <lable for="lastname">นามสกุล</lable>
                                                <input type="text" class="form-control" name="lastname">
                                                @error('lastname')
                                                <div class="alert alert-danger">{{$message}}</div>
                                                @enderror
                                                <lable for="address">ที่อยู่</lable>
                                                <input type="text" class="form-control" name="address">
                                                @error('address')
                                                <div class="alert alert-danger">{{$message}}</div>
                                                @enderror
                                                <lable for="contactno">เบอร์ติดต่อ</lable>
                                                <input type = "number" min = "0" max = "9999999999" class="form-control" name="contactno">           
                                                @error('contactno')
                                                <div class="alert alert-danger">{{$message}}</div>
                                                @enderror
                                                <lable for="checkin">วันที่จอง</lable>
                                                <input type="date" id="choosedate" class="form-control" name="checkin" min="<?php echo date('Y-m-d');?>">
                                                </div>
                                                @error('date')
                                                <div class="alert alert-danger">{{$message}}</div>
                                                @enderror
                                                <lable for="checkin_time">เวลา</lable>
                                                <br /><br />
                                                <a class="btn btn-secondary"></a> ว่าง  <button class="btn btn-danger"></button> มีการจอง <br>
                                                <br><br>                                         
                                                <div class="container" id ="slotbtn">
                                                    <!-- <button type="button"  class="btn btn-secondary time-slot ms-2 mb-2" data-start-time="07:00" data-end-time="08:00">07:00-08:00</button> 
                                                    <button type="button"  class="btn btn-secondary time-slot ms-2 mb-2" data-start-time="08:00" data-end-time="09:00">08:00-09:00</button>
                                                    <button type="button"  class="btn btn-secondary time-slot ms-2 mb-2" data-start-time="09:00" data-end-time="10:00">09:00-10:00</button> 
                                                    <button type="button"  class="btn btn-secondary time-slot ms-2 mb-2" data-start-time="10:00" data-end-time="11:00">10:00-11:00</button>
                                                    <button type="button"  class="btn btn-secondary time-slot ms-2 mb-2" data-start-time="11:00" data-end-time="12:00">11:00-12:00</button>
                                                    <button type="button"  class="btn btn-secondary time-slot ms-2 mb-2" data-start-time="12:00" data-end-time="13:00">12:00-13:00</button>
                                                    <button type="button"  class="btn btn-secondary time-slot ms-2 mb-2" data-start-time="13:00" data-end-time="14:00">13:00-14:00</button>
                                                    <button type="button"  class="btn btn-secondary time-slot ms-2 mb-2" data-start-time="14:00" data-end-time="15:00">14:00-15:00</button>
                                                    <button type="button"  class="btn btn-secondary time-slot ms-2 mb-2" data-start-time="15:00" data-end-time="16:00">15:00-16:00</button>
                                                    <button type="button"  class="btn btn-secondary time-slot ms-2 mb-2" data-start-time="16:00" data-end-time="17:00">16:00-17:00</button> -->
                                                    <button type="button"  class="btn btn-secondary time-slot ms-2 mb-2" data-start-time="17:00" data-end-time="18:00">17:00-18:00</button>
                                                    <button type="button"  class="btn btn-secondary time-slot ms-2 mb-2" data-start-time="18:00" data-end-time="19:00">18:00-19:00</button>
                                                    <button type="button"  class="btn btn-secondary time-slot ms-2 mb-2" data-start-time="19:00" data-end-time="20:00">19:00-20:00</button>
                                                    <button type="button"  class="btn btn-secondary time-slot ms-2 mb-2" data-start-time="20:00" data-end-time="21:00">20:00-21:00</button>
                                                    <button type="button"  class="btn btn-secondary time-slot ms-2 mb-2" data-start-time="21:00" data-end-time="22:00">21:00-22:00</button>
                                                    <button type="button"  class="btn btn-secondary time-slot ms-2 mb-2" data-start-time="22:00" data-end-time="23:00">22:00-23:00</button> 
                                                </div>  

                                                    <br><br>
                                                    <input type="hidden" name="checkin_time" id="checkin-time">
                                                    <input type="hidden" name="checkout_time" id="checkout-time">
                                                    <input type="hidden" name="hour" id="hour">
                                                
                                            </div>
                                            <input type="submit" onclick="return confirm('ยืนยันการจองสนาม ?')" value="ยืนยันการจอง" class="btn btn-primary">
                                        </form>
                                    </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>

            <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

            
            <script>
                $('#slotbtn .btn').prop('disabled', true);
                $(document).ready(function(){
                $('#choosedate').change(function() {
                    var selectedDate = $(this).val();
                    temp = document.location.href.split('\/');
                    field_id = parseInt(temp[temp.length-1]);

                    $.ajax({
                        url: '/api/data',
                        type: 'GET',
                        data: { date: selectedDate},
                                success: function(transactions) {
                                    
                                    initial_time_id = parseInt(document.getElementById("slotbtn").getElementsByTagName("Button")[0].textContent.split(':')[0]);

                                    slotbtn_list = document.getElementById("slotbtn").getElementsByTagName("Button");
                                    Array.from(slotbtn_list).forEach(s => { s.disabled = false; s.classList.remove("btn-danger"); });
                                                for(var i=0 ; i < transactions.length ; i++){
                                                    time_id = parseInt(transactions[i]['checkin_time'].split(':')[0]);
                                                    index = time_id - initial_time_id;
                                                    if (transactions[i]['field_id'] === field_id) {
                                                        slotbtn_list[index].disabled = true;
                                                        slotbtn_list[index].classList.add("btn-danger");
                                                        for(var j=1 ; j < transactions[i]['hour'] ; j++){
                                                            slotbtn_list[index + j].disabled = true;
                                                            slotbtn_list[index + j].classList.add("btn-danger");
                                                        }
                                                    }
                                                }
                                            }
                                        });
                                    });
                                });

            </script>

            <script>
                const timeSlots = document.querySelectorAll('.time-slot');
                const checkinTimeInput = document.querySelector('#checkin-time');
                const hourInput = document.querySelector('#hour');
                const transactions = {!! json_encode($transaction) !!};

                let selectedSlots = [];

                timeSlots.forEach(timeSlot => {
                    timeSlot.addEventListener('click', () => {
                        const startTime = timeSlot.getAttribute('data-start-time');
                        const endTime = timeSlot.getAttribute('data-end-time');
                        const slotIndex = selectedSlots.findIndex(slot => slot.startTime === startTime && slot.endTime === endTime);
                        
                        if (slotIndex > -1) {
                            selectedSlots.splice(slotIndex, 1);
                        } else {
                            selectedSlots.push({ startTime, endTime });
                        }

                        checkinTimeInput.value = selectedSlots.length > 0 ? selectedSlots[0].startTime : '';
                        const start = new Date(`2023-03-23 ${selectedSlots[0].startTime}`).getTime();
                        const end = new Date(`2023-03-23 ${selectedSlots[selectedSlots.length - 1].endTime}`).getTime();
                        const diffInMs = end - start;
                        const diffInHours = diffInMs / (1000 * 60 * 60);
                        hourInput.value = diffInHours.toFixed(2);

                        timeSlots.forEach(ts => ts.classList.remove('btn-info'));
                        selectedSlots.forEach(slot => {
                            const slotElement = document.querySelector(`.time-slot[data-start-time="${slot.startTime}"][data-end-time="${slot.endTime}"]`);
                            if (slotElement) {
                                slotElement.classList.add('btn-info');
                            }
                            });
                        });
                    })
                
            </script>

            
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>

  
</html>
  