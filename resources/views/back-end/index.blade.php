<!DOCTYPE html>
<html lang="en">
<head>

    @include('back-end.common.css')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
</head>
<body>
    <div class="wrapper">
        <div class="container">
            <div class="dashboard">

            @include('back-end.common.menu')

                <div class="right">
                    <div class="right__content">
                        <div class="right__title">Bảng điều khiển</div>
                        <p class="right__desc">Bảng điều khiển</p>
                        <div class="right__cards">
                            <a class="right__card" href="/admin/products">
                                <div class="right__cardTitle">Sản Phẩm</div>
                                <div class="right__cardNumber">{{$qualityOfProduct}}</div>
                                <div class="right__cardDesc">Xem Chi Tiết <img src="/assets/arrow-right.svg" alt=""></div>
                            </a>
                            <a class="right__card" href="/admin/customers">
                                <div class="right__cardTitle">Khách Hàng</div>
                                <div class="right__cardNumber">{{$qualityOfUser}}</div>
                                <div class="right__cardDesc">Xem Chi Tiết <img src="/assets/arrow-right.svg" alt=""></div>
                            </a>
                            <a class="right__card" href="/admin/categories">
                                <div class="right__cardTitle">Danh Mục</div>
                                <div class="right__cardNumber">{{$qualityOfCategory}}</div>
                                <div class="right__cardDesc">Xem Chi Tiết <img src="/assets/arrow-right.svg" alt=""></div>
                            </a>
                            <a class="right__card" href="/admin/orders">
                                <div class="right__cardTitle">Đơn Hàng</div>
                                <div class="right__cardNumber">{{$qualityOfSaleOrder}}</div>
                                <div class="right__cardDesc">Xem Chi Tiết <img src="/assets/arrow-right.svg" alt=""></div>
                            </a>
							<a class="right__card" href="/admin/collections">
                                <div class="right__cardTitle">Bộ sưu tập</div>
                                <div class="right__cardNumber">{{$qualityOfCollection}}</div>
                                <div class="right__cardDesc">Xem Chi Tiết <img src="/assets/arrow-right.svg" alt=""></div>
                            </a>
                        </div>
                        <div class="row">
						    <canvas id="myChart"></canvas>
						</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
	@include('back-end.common.js')

	<script src="{{asset('js/jquery-3.5.1.min.js')}}"></script>
	<!-- chart -->
	<script>
	$.ajax({
		url : "/api/calculate",
		type : "get",
		dataType : "json",
		success : function(res) {
			var keyres = Object.keys(res);
			var valueres = Object.values(res);
			
			let myChart = document.getElementById('myChart').getContext('2d');
		    // Global Options
		    Chart.defaults.global.defaultFontFamily = 'Lato';
		    Chart.defaults.global.defaultFontSize = 16;
		    Chart.defaults.global.defaultFontColor = '#777';

		    let massPopChart = new Chart(myChart, {
		      type:'bar', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
		      data:{
		        labels: keyres,
		        datasets:[{
		          label:'Doanh Thu',
		          data: valueres,
		          //backgroundColor:'green',
		          backgroundColor:[
		            'rgba(255, 99, 132, 0.6)',
		            'rgba(54, 162, 235, 0.6)',
		            'rgba(255, 206, 86, 0.6)',
		            'rgba(75, 192, 192, 0.6)',
		            'rgba(153, 102, 255, 0.6)',
		            'rgba(255, 159, 64, 0.6)',
		            'rgba(255, 99, 132, 0.6)'
		          ],
		          borderWidth:1,
		          borderColor:'#777',
		          hoverBorderWidth:3,
		          hoverBorderColor:'#000'
		        }]
		      },
		      options:{
		        title:{
		          display:true,
		          text:'Thống Kê Doanh Thu',
		          fontSize:25
		        },
		        legend:{
		          display:false,
		          position:'right',
		          labels:{
		            fontColor:'#000'
		          }
		        },
		        layout:{
		          padding:{
		            left:50,
		            right:0,
		            bottom:0,
		            top:0
		          }
		        },
		        tooltips:{
		          enabled:true
		        }
		      }
		    });
		},
		error : function(res) {
			
		}
	});
    
  </script>
	<!--  -->
	
</body>
</html>