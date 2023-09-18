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
                        <li class="nav-item"><a href="{{ route('rule') }}" class="nav-link active" aria-current="page">กฎของสนามกีฬา</a></li>
                    </ul>
                    </header>
                </div>     
				<div class="container">
                        <div class="row">
                            <div class="col-12">
                                <h3 class="text mt-4 mb-5">กฏระเบียบและข้อปฏิบัติของสนามกีฬา</h3>
                            </div>
                        </div>
						<div class="card mb-4 bg-light">
							<div style = "margin-left:0;" class = "container">
								<div class = "panel panel-default">
									<div class = "panel-body">
								
									<strong><h4 style = "color:#ff0000;">1. เวลาเปิด-ปิด</h4></strong>
										<p><p>1.1 สนามเปิดให้บริการตั้งแต่เวลา 8:00 น. จนถึงเวลา 22:00 น.</p>
										<p>1.2 หากลูกค้าต้องการใช้บริการก่อนหรือหลังเวลาที่กำหนด สามารถติดต่อเจ้าหน้าที่เพื่อเช็คสถานการณ์ได้</p>
										<br />
									<strong><h4 style = "color:#ff0000;">2. การจองสนาม</h4></strong>
										<p>2.1 ลูกค้าสามารถจองสนามกีฬาได้ทางโทรศัพท์หรือผ่านเว็บไซต์</p>
										<p>2.2 การจองต้องทำล่วงหน้าอย่างน้อย 1 วัน</p>
										<p>2.3 หากต้องการยกเลิกการจอง ต้องทำการแจ้งยกเลิกกับเจ้าหน้าที่ก่อนเวลาเปิดสนามอย่างน้อย 2 ชั่วโมง</p>
										<p>2.4 หากไม่ได้แจ้งยกเลิกหรือเลื่อนการใช้บริการ สามารถจองสนามได้ใหม่หลังจากผ่านไป 30 นาทีแล้ว</p>
										<br />
									<strong><h4 style = "color:#ff0000;">3. การเช็คอินและเช็คเอาท์</h4></strong>
										<p>3.1 การเช็คอินสามารถทำได้ตั้งแต่เวลา 8:00 น. เป็นต้นไป</p>
										<p>3.2 หากเช็คอินก่อนเวลา ต้องติดต่อเจ้าหน้าที่เพื่อขออนุญาตเช็คอิน</p>
										<br />
									<strong><h4 style = "color:#ff0000;">4. การใช้บริการอินเทอร์เน็ตและอื่นๆ</h4></strong>
										<p>สนามกีฬามีบริการอินเทอร์เน็ตไร้สายฟรีสำหรับผู้เข้าใช้งาน โดยมีรหัสผ่านให้ใช้งานที่สนามกีฬา และสามารถเชื่อมต่อได้ในบริเวณใกล้เคียง</p>
										<br />
									<strong><h4 style = "color:#ff0000;">5. กฎการใช้สิ่งอำนวยความสะดวกอื่นๆ</h4></strong>
										<p>สนามกีฬาอาจมีกฎการใช้งานสิ่งอำนวยความสะดวกเพิ่มเติม เช่น การใช้งานโรงอาหาร ห้องอ่านหนังสือ หรือห้องประชุม โดยเงื่อนไขการใช้งานจะแตกต่างกันไปตามสถานที่และบริการที่เสนอ</p>	
									</div>
								</div>
							</div>
						</div>
					</div>


				<br />
				<br />
	

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>

  
</html>
