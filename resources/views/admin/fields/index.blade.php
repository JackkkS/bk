<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            ยินดีต้อนรับ {{Auth::user()->name}}

        </h2>
    </x-slot>

    <div class="py-12">
        <div>
            
        </div>
        <div class="container">
            <div class="row">
                @if (session("success"))
                    <div class="alert alert-success">{{session("success")}}</div>
                @endif
                <div class="col-12">
                <a href="{{ route('fields_add') }}" class="btn btn-success">เพิ่มสนามกีฬา</a>
                    <div class="crad">
                        <br />
                        <div class="crad-header">ข้อมูลสนาม</div>
                        <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ลำดับ</th>
                            <th scope="col">ชื่อสนาม</th>
                            <th scope="col">ประเภทสนามกีฬา</th>
                            <th scope="col">ราคา</th>
                            <th scope="col">รูปสนามกีฬา</th>
                            <th scope="col">วันที่เพิ่มข้อมูล</th>
                            <th scope="col">แก้ไขข้อมูล</th>
                            <th scope="col">ลบข้อมูล</th>
                            <th scope="col">สถานะของสนาม</th>
                
                        </tr>
                    </thead>
                    <tbody>
                       
                        @foreach($fields as $row)
                        <tr>
                            <th>{{$fields->firstItem()+$loop->index}}</th>
                            <td>{{$row ->field_name}}</td>
                            <td>{{$row ->field_type}}</td>
                            <td>{{$row ->price}}</td>
                            <td>
                                <img src="{{asset($row->photo1)}}" alt="" width="150px" height="150px">
                                <br />
                                <img src="{{asset($row->photo2)}}" alt="" width="150px" height="150px">
                                <br />
                                <img src="{{asset($row->photo3)}}" alt="" width="150px" height="150px">
                                <br />
                                <img src="{{asset($row->photo4)}}" alt="" width="150px" height="150px">
                            </td>
                            <td>{{$row ->created_at}}</td>
                            <td>
                                <a href="{{url('/field/edit/'.$row->field_id)}}" class="btn btn-warning">แก้ไข</a>
                            </td>
                            <td>
                                <a href="{{url('/field/delete/'.$row->field_id)}}" class="btn btn-danger" onclick="return confirm('ต้องการลบข้อมูลหรือไม่ ?')">ลบข้อมูล</a>
                            </td>
                            <td>
                                {{$row->field_status}}
                                <br /> <br />
                                <form action="{{url('/field/update/status/'.$row->field_id)}}" required = required method="POST">
                                @csrf
                                <select name="status">
                                    <option value="เปิดใช้งาน">เปิดใช้งาน</option>
                                    <option value="ปิดปรับปรุง">ปิดปรับปรุง</option>
                                </select>
                                <button type="submit" class="btn btn-info" onclick="return confirm('ยืนยันการเปลี่ยนสถานะสนามหรือไม่ ?')">แก้ไขสถานะ</button>
                            </form>
                    
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                        {{$fields->links()}}
                    </div>
                </div>
               
            </div>
        </div>
    </div>
</x-app-layout>
