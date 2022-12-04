<!DOCTYPE html>
<html lang="en">
<head>
    @include('back-end.common.css')
</head>
<body>
    <div class="wrapper">
        <div class="container">
            <div class="dashboard">
            @include('back-end.common.menu')
                <div class="right">
                    <div class="right__content">
                        <div class="right__title">Bảng điều khiển</div>
                        <p class="right__desc">Thêm admin</p>
                        <div class="right__formWrapper">
                            <form action="/admin/decentralization-add" method="post" modelAttribute="category">
                            @csrf
                                <div class="right__inputWrapper">
									<label>Email</label>
									<input type="text" class="form-control" name="email" value="{{$decen->email}}" required/>
									<small id="emailHelp" class="form-text text-muted">
											Tối đa 15 kí tự.
									</small>
								</div>
                                <button class="btn" type="submit">Thêm</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('back-end.common.js')
    <script>

	$('#txtDetailDescription').summernote({
        placeholder: 'Hello stand alone ui',
        tabsize: 2,
        height: 120,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
      });
    </script>
</body>
</html>