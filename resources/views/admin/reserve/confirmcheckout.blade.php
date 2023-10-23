<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            ยินดีต้อนรับ {{Auth::user()->name}}

        </h2>
    </x-slot>

    <div class="py-12">
    
        <div class="container">
            <div class="row">
            <div class = "container-fluid">
		<div class = "panel panel-default">
			<div class = "panel-body">
				<div class = "alert alert-info">ค่าใช้จ่ายอื่นๆ</div>
				@error('expensetype')
                    	<div class="alert alert-danger">{{$message}}</div>
                @enderror
                @error('expenses')
                    	<div class="alert alert-danger">{{$message}}</div>
                @enderror
				
				<form method="POST" action="{{ url('/admin/reserve/checkoutsuccess/'.$transaction->transaction_id) }}">
					@csrf
					<div class="form-inline" style="float:left;">
						<label>ชื่อนามสกุล</label>
						<br />
						<input type="text" value="{{$transaction->guest->firstname}} {{$transaction->guest->lastname}}" class="form-control" size="40" disabled="disabled" />
					</div>

					<div class="form-inline" style="float:left; margin-left:20px;">
						<label>ชื่อสนามกีฬา</label>
						<br />
						<input type="text" value="{{$transaction->field->field_name}}" class="form-control" size="40" disabled="disabled" />
					</div>
					<br style="clear:both;" />
					<br />
					<div class="form-inline" style="float:left;">
						<label>ประเภทสนามกีฬา</label>
						<br />
						<input type="text" value="{{$transaction->field->field_type}}" class="form-control" size="20" disabled="disabled" />
					</div>
					<div class="form-inline" style="float:left; margin-left:20px;">
						<label>จำนวนชั่วโมง</label>
						<br />
						<input type="text" value="{{$transaction->hour}}" class="form-control" size="20" disabled="disabled" />
					</div>
					
					<div class="form-inline" style="float:left; margin-left:20px;">
						<label>โปรดระบุประเภทค่าใช้จ่าย เช่น ค่าไฟ,ค่าน้ำดื่ม,ค่ากรรมการ</label>
						<br />
						<input type="text" name="expensetype" class="form-control" /> 
					</div>
					<div class="form-inline" style="float:left; margin-left:20px;">
						<label>ค่าใช้จ่ายอื่นๆ</label>
						<br />
						<input type="number" min="0" max="999999" name="expenses" class="form-control" /> 
					</div>
					
					<br style="clear:both;" />
					<br />
					<button type="submit" name="add_form" class="btn btn-primary" onclick="return confirm('ยืนยันการออกจากการใช้บริการ ?')">ยืนยัน</button>
				</form>

				</div>
			</div>
		</div>
		</div>
		</div>
</x-app-layout>

