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
				<a href ="{{url('/admin/reserve')}}" class = "btn btn-success"></span> Pendings</a>
				<a href ="{{url('/admin/reserve/checkin')}}" class = "btn btn-info" ></span> Check In</a>
				<a href ="{{url('/admin/reserve/checkout')}}" class = "btn btn-warning disabled" ></i> Check Out</a>
				<br />
				<br />
				
            </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ลำดับ</th>
                            <th scope="col">ชื่อและนามสกุล</th>
                            <th scope="col">ชื่อสนาม</th>
                            <th scope="col">ประเภทสนาม</th>
                            <th scope="col">เวลาการเข้าใช้บริการ</th>
                            <th scope="col">ชั่วโมงในการจอง</th>
                            <th scope="col">เวลาออก</th>
                            <th scope="col">ค่าสนามกีฬา</th>
                            <th scope="col">ประเภทค่าใช้จ่ายอื่นๆ</th>
                            <th scope="col">ค่าใช้จ่ายอื่นๆ</th>
                            <th scope="col">ยอดรวม</th>


                        </tr>
                    </thead>
                    <tbody>
                        @php($i=1)
                        @php($total = 0)
                        @foreach($transaction as $row)
                        @php($price = $row->field->price)
                        @php($hour = $row->hour)
                        @php($subtotal = $price * $hour)
                        @php($expenses = $row->expenses)
                        @php($bill = $subtotal + $expenses)
                        
                        @if($row->status === 'check out')
                        <tr>
                            <th>{{$i++}}</th>
                            <td>{{$row ->guest->firstname}} {{$row ->guest->lastname}}</td>
                            <td>{{$row->field->field_name}}</td>
                            <td>{{$row->field->field_type}}</td>
                            <td>{{$row->checkin_time}}</td>
                            <td>{{$row ->hour}}</td>
                            <td>{{$row ->checkout_time}}</td>
                            <td>{{$subtotal}}</td>
                            <td>{{$row->expensetype}}</td>
                            <td>{{$row ->expenses}}</td>
                            <td>{{$bill}}</td>
                            
                            
                            
                        </tr>
                        @php($total += $bill)
                        @endif
                        @endforeach
                        <tr>
                            <td colspan="8" align="right">ยอดรวมของบิล</td>
                            <td>{{$total}}</td>
                            <td></td>
                        </tr>
                    </tbody>
                    </table>
            </div>
        </div>
    </div>
</x-app-layout>
