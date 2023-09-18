<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            ยินดีต้อนรับ {{Auth::user()->name}}

            <b class ="float-end">มีจำนวนผู้ใช้งานระบบ {{count($users)}} คน</b>
        </h2>
    </x-slot>
    
    <div class="py-12">
    @if (session("success"))
            <div class="alert alert-success">{{session("success")}}</div>
    @endif
        <div class="container">
        @if(Auth::user()->name == 'Admin')
            <a href="{{ route('register') }}" class="btn btn-success">เพิ่มผู้ดูแลระบบ</a>
        @endif
        
            <div class="row">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ลำดับ</th>
                            <th scope="col">ชื่อ</th>
                            <th scope="col">อีเมล</th>
                            <th scope="col">วันที่เข้าสู่ระบบ</th>
                            @if(Auth::user()->name == 'Admin')
                            <th scope="col">ลบข้อมูล</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                    @php($i=1)
                    @foreach($users as $row)
                        @if($row->name == 'Admin')
                            <tr>
                                <th>{{$i}}</th>
                                <td>{{$row ->name}}</td>
                                <td>{{$row ->email}}</td>
                                <td>{{$row ->created_at->diffForHumans()}}</td>
                                @if(Auth::user()->name == 'Admin')
                                    <td>
                                    </td>
                                    @endif
                            </tr>
                        @endif
                    @endforeach

                        
                   
                        @php($i=2)
                        @foreach($users as $row)
                            @if($row->name != 'Admin')
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{ $row->name }}</td>
                                    <td>{{ $row->email }}</td>
                                    <td>{{ $row->created_at->diffForHumans() }}</td>
                                    @if(Auth::user()->name == 'Admin')
                                    <td>
                                        <a href="{{url('/auth/delete/'.$row->id)}}" class="btn btn-danger" onclick="return confirm('ต้องการลบข้อมูลหรือไม่ ?')">ลบข้อมูล</a>
                                    </td>
                                    @endif
                                </tr>
                            @endif
                        @endforeach

                    </tbody>
                    </table>
            </div>
        </div>
    </div>
</x-app-layout>
