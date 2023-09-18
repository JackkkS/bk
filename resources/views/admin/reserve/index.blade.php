<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            ยินดีต้อนรับ {{Auth::user()->name}}

        </h2>
    </x-slot>

    <div class="py-12">
    
        <div class="container">
            <div class="row">
            @if (session("success"))
                <div class="alert alert-success">{{session("success")}}</div>
             @endif
            <div class = "panel-body">
				<a href ="{{url('/admin/reserve')}}" class = "btn btn-success disabled"></span> Pendings</a>
				<a href ="{{url('/admin/reserve/checkin')}}" class = "btn btn-info" ></span> Check In</a>
				<a href ="{{url('/admin/reserve/checkout')}}" class = "btn btn-warning" ></i> Check Out</a>
				<br />
				<br />
				
            </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ลำดับ</th>
                            <th scope="col">ชื่อและนามสกุล</th>
                            <th scope="col">เบอร์ติดต่อ</th>
                            <th scope="col">ชื่อสนาม</th>
                            <th scope="col">ประเภทสนาม</th>
                            <th scope="col">วันที่</th>
                            <th scope="col">เวลา</th>
                            <th scope="col">ชั่วโมงในการจอง</th>
                            <th scope="col">ราคารวม</th>
                            <th scope="col">หลักฐานการชำระเงิน</th>
                            <th scope="col">สถานะ</th>
                            <th scope="col">ยืนยันการจอง</th>
                            <th scope="col">ลบการจอง</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($i=1)
                        @php($total = 0)
                        @foreach($transaction as $row)
                        @php($price = $row->field->price)
                        @php($hour = $row->hour)
                        @php($subtotal = $price * $hour)
                        @if($row->status === 'pending' || $row->status === 'รอการชำระ' || $row->status === 'รอการติดต่อเรื่องเวลาซ้ำ')
                        <tr>
                            <th>{{$i++}}</th>
                            <td>{{$row ->guest->firstname}} {{$row ->guest->lastname}}</td>
                            <td>{{$row->guest->contactno}}</td>
                            <td>{{$row->field->field_name}}</td>
                            <td>{{$row->field->field_type}}</td>
                            <td>{{$row ->checkin}}</td>
                            <td>{{$row ->checkin_time}}</td>
                            <td>{{$row ->hour}}</td>
                            <td>{{$subtotal}}</td>
                            <td>
                            @if(isset($row->payment) && file_exists(public_path($row->payment)))
                                <img src="{{ asset($row->payment) }}" alt="" width="400px" height="400px">
                            @else
                                <p>ยังไม่มีหลักฐานการชำระเงิน</p>
                            @endif
                            </td>
                            <td>{{$row ->status}}</td>
                            <td>
                            @if($row->status === 'pending' && isset($row->payment) && file_exists(public_path($row->payment)))
                            <form action="{{ url('/admin/reserve/checkin/comfirm/' . $row->transaction_id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-success" onclick="return confirm('ยืนยันการจองหรือไม่ ?')">ยืนยัน</button>
                            </form>
                            @else
                            <button type="button" class="btn btn-success" onclick="showContactMessage()">ยืนยัน</button>
                            @endif
                            </td>
                            <td>
                                <a href="{{url('/reserve/delete/'.$row->transaction_id)}}" class="btn btn-danger" onclick="return confirm('ต้องการลบข้อมูลหรือไม่ ?')">ลบ</a>
                            </td>
                        </tr>
                        @endif
                        @endforeach
                        
                    </tbody>
                    </table>
            </div>
        </div>
    </div>
    <script>
        function showContactMessage() {
            alert('ไม่สามารถยืนยันการจองได้ ');
        }
    </script>
</x-app-layout>
