<!DOCTYPE html>
<html lang="en">
<head>
    @include('back-end.common.css')
    <link href="http://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" rel="stylesheet">
    <style>
    .add{
    	padding: 20px 10px;
    	width: 150px;
    	float:right;
    	border: 1px solid black;
    	border-radius: 15px;
    	color: black;
    	background-color: white;
    	margin-bottom: 20px;
    	font-weight: bolder;

    }

    .add:hover{
    	background-color:black;
    	color:white;
    	transition: 0.5s;
    }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container">
            <div class="dashboard">
                @include('back-end.common.menu')
                <div class="right">
                    <div class="right__content">
                        <div class="right__title">Bảng điều khiển</div>
                        <p class="right__desc">Xem khách hàng </p>
                        <div class="right__table">
                            <div class="right__tableWrapper">
                                <table id="myTable">
                                    <thead>
                                        <tr>
                                            <th scope="col">STT</th>
                                            <th scope="col">Tên</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Phone</th>
                                            <th scope="col">Địa chỉ</th>
                                            <th scope="col">Xoá</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($customers as $customer)
	                                        <tr>
	                                            <td data-label="STT" scope="row">{{$loop->iteration}}</td>
	                                            <td data-label="Tên">{{$customer->name}}</td>
	                                            <td data-label="Email">{{$customer->email}}</td>
                                                <td data-label="Phone">{{$customer->phonenumber}}</td>
                                                <td data-label="Địa chỉ">{{$customer->address}}</td>
	                                            <td data-label="Xoá" class="right__iconTable"><a onclick="myFunction({{$customer->id}})"><img src="/assets/icon-trash-black.svg" alt=""></a></td>
	                                        </tr>
                                       @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('back-end.common.js')
	<script type="text/javascript" src="http://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
	<script>
	function myFunction(id){
		  var r = confirm("Bạn có muốn xoá khách hàng này ?");
		  if (r == true) {
		    window.location = "/admin/customer-delete/" + id;
		  } else {
		    window.location = "/admin/customers";
		  }
	}

	$(document).ready( function () {
	    $('#myTable').DataTable();
	} );
	</script>
</body>
</html>
