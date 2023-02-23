@extends('layouts.tam')

@section('content')
<main class="content">
				<div class="container-fluid p-0">

					<div class="mb-3">
						<h1 class="h3 d-inline align-middle">แบบฟอร์มการสมัครเป็นผู้ช่วยสอน</h1>
						<a class="badge bg-dark text-white ms-2" href="upgrade-to-pro.html"></a>
					</div>
					<form action="{{ route('request.store') }}" method="POST" enctype="multipart/form-data">
						@csrf
						<input type="hidden" id="request_id" name="request_id" value="{{$req->request_id}}">
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12">
								<div class="form-group">
										<label for="course_id">รายวิชาที่ต้องการสมัคร :</label>
                                    		<select class="form-control mb-0" name="course_id">
                                        		@if ($courses->count())
                                            		@foreach($courses as $course)
													<div class="card-body">
                                                		<option value="{{ $course->course_id }}">{{$course->subject->subject_id}} | {{$course->subject->name_en}}</option>
													</div>   
                                            		@endforeach
                                        		@endif
											</select>
								</div>
							</div>
						</div><br>
						<div class="row">
                			<div class="col-xs-12 col-sm-12 col-md-12">
                    			<div class="form-group">
                        			<strong>รายละเอียด :</strong>
                        			<input type="text" name="detail" class="form-control" placeholder="รายละเอียดการสมัคร">
                        			@error('detail')
                        			<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        			@enderror
                    			</div>
                			</div>
						</div><br>
									<div class="col-2">
                                            <button type="submit" class="btn btn-success">Add Data</button>
                                    </div>
					</form>			
				</div>


							
@endsection