@extends('layouts.tam')

@section('content')
<div class="container-fluid p-0">

					<h1 class="h3 mb-3">ข้อมูลการสมัครเป็นผู้ช่วยสอน</h1>

					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header">
                                    <div class="row py-0">
                                        <div class="col-10">
									        <h5 class="card-title mb-0">รายการทั้งหมด</h5>
                                        </div>
                                        <div class="col-2">
                                            <a href="{{ route('request.create') }}" class="btn btn-info">ยื่นใบสมัคร</a>
                                        </div>
                                    </div>
								</div>
								<div class="card-body">
                                <table class="table table-hover my-0">
									<thead>
										<tr>
											<th>#</th>
											<th class="d-none d-xl-table-cell">รหัสนักศึกษา</th>
											<th class="d-none d-xl-table-cell">ชื่อ-นามสกุล</th>
                                            <th class="d-none d-md-table-cell">รายวิชาที่สมัคร</th>
                                            <th class="d-none d-md-table-cell">วันที่สมัคร</th>
                                            <th>สถานะ</th>
                                            <th></th>
										</tr>
									</thead>
									<tbody>
                                        @foreach($reqs as $req)
										<tr>
											<td>{{$req->request_id}}</td>
											<td class="d-none d-xl-table-cell">{{$req->user->id}}</td>
                                            <td class="d-none d-xl-table-cell">{{$req->user->name}}</td>
											<td class="d-none d-xl-table-cell">{{$req->course->subject_id}} {{$req->course->subject->name_th}}</td>
											<td class="d-none d-md-table-cell">{{$req->created_at}}</td>
                                            <td><span class="badge bg-success">Done</span></td>
											<td><a href="{{route('request.edit',$req->request_id)}}" class="btn btn-warning">Edit</a></td>
                                            <td></td>
										</tr>
                                        @endforeach
									</tbody>
								</table>
								</div>
							</div>
						</div>
					</div>

				</div>
@endsection