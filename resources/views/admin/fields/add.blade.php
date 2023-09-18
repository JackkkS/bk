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
                <div class="col-4">
                <div class = "alert alert-info">สนามกีฬา / เพิ่มสนาม</div> 
                @if (session("success"))
                    <div class="alert alert-success">{{session("success")}}</div>
                @endif
                <div class="card">
                        <div class="card-header">เพิ่มสนามกีฬา</div>
                        <div class="card-body">
                            <form action="{{route('add_success')}}" method="post"  enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <lable for="field_name">ชื่อสนามกีฬา</lable>
                                    <input type="text" class="form-control" name="field_name">
                                    @error('field_name')
                                        <div class="alert alert-danger">{{$message}}</div>
                                    @enderror

                                    <!-- <lable for="field_type">ประเภทสนามกีฬา</lable>
                                    <input type="text" class="form-control" name="field_type">
                                    @error('field_type')
                                        <div class="alert alert-danger">{{$message}}</div>
                                    @enderror -->

                                    <lable for="field_type">ประเภทสนามกีฬา</lable>
                                    <select class = "form-control" required = required name = "field_type">
                                        <option value = "">เลือกประเภทสนามกีฬา</option>
                                        <option value = "สนามฟุตบอล">สนามฟุตบอล</option>
                                        <option value = "สนามฟุตซอล">สนามฟุตซอล</option>
                                        <option value = "สระว่ายน้ำ">สระว่ายน้ำ</option>
                                        <option value = "สนามวิ่ง">สนามวิ่ง</option>
                                        <option value = "สนามบาส">สนามบาส</option>
                                    </select>
                                

                                    <lable for="price">ราคา</lable>
                                    <input type = "number" min = "0" max = "999999999" class="form-control" name="price">
                                    @error('price')
                                        <div class="alert alert-danger">{{$message}}</div>
                                    @enderror

                                    <lable for="photo1">รูปสนามกีฬารูปที่1</lable>
                                    <input type="file" class="form-control" name="photo1">
                                    @error('photo1')
                                        <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                    
                                    <lable for="photo2">รูปสนามกีฬารูปที่2</lable>
                                    <input type="file" class="form-control" name="photo2">
                                    @error('photo2')
                                        <div class="alert alert-danger">{{$message}}</div>
                                    @enderror 

                                    <lable for="photo3">รูปสนามกีฬารูปที่3</lable>
                                    <input type="file" class="form-control" name="photo3">
                                    @error('photo3')
                                        <div class="alert alert-danger">{{$message}}</div>
                                    @enderror 

                                    <lable for="photo4">รูปสนามกีฬารูปที่4</lable>
                                    <input type="file" class="form-control" name="photo4">
                                    @error('photo4')
                                        <div class="alert alert-danger">{{$message}}</div>
                                    @enderror 
                                </div>
                                
                                </br >
                                <input type="submit" value="บันทึก" class="btn btn-primary">
                            </form>
                        </div>
                        </div>
                    </div>
               
            </div>
        </div>
    </div>
</x-app-layout>
