<script>
                                    $(document).ready(function() {
                                        $("#form").submit(function(e) {
                                            //prevent Default functionality
                                            e.preventDefault();

                                            //get the action-url of the form
                                            var actionurl = e.currentTarget.action;
                                            var formData = new FormData($("#form")[0]);

                                            $.ajax({
                                                url: actionurl, // Replace with the actual route
                                                method: 'POST',
                                                data: $("#form").serialize(),
                                                dataType:'application/json',
                                                enctype: 'multipart/form-data',
                                                success: function(response) {
                                                    alert(response.message);
                                                    $("#form")[0].reset();
                                                },
                                                error: function(error) {
                                                    alert(error.responseJSON.message);
                                                }
                                            });

                                        });

                                    });
                                </script>



<!doctype html>
<html lang="en">

<head>
    <title>Product Details</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="{{ asset('frontend/css/styles.css') }}" rel="stylesheet" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
        .small-img-group {
            display: flex;
            justify-content: space-between;
        }

        .small-img-col {
            flex-basis: 24%;
            cursor: pointer;
        }

        #MainImg:hover {
            color: #fd9a6ce5;
            box-shadow: 2px 2px 15px #fd9a6ce5;
            transform: scale(1.03);
        }

        .small-img:hover {
            color: #fd9a6ce5;
            box-shadow: 2px 2px 15px #fd9a6ce5;
            transform: scale(1.03);
        }
    </style>

</head>

<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-5 col-md-12 col-sm-12">
                <figure id="img-area">
                    <img id="MainImg" class="img-fluid w-100 mb-2 border rounded " src="{{ asset('storage/image/1.jpg') }}" alt="">
                </figure>
                <div class="small-img-group">
                    <div class="small-img-col">
                        <img src="{{ asset('storage/image/1.jpg') }}" width="100%" class="small-img border rounded" alt="">
                    </div>
                    <div class="small-img-col">
                        <img src="{{ asset('storage/image/2.jpg') }}" width="100%" class="small-img border rounded" alt="">
                    </div>
                    <div class="small-img-col">
                        <img src="{{ asset('storage/image/3.jpg') }}" width="100%" class="small-img border rounded" alt="">
                    </div>
                    <div class="small-img-col">
                        <img src="{{ asset('storage/image/1.jpg') }}" width="100%" class="small-img border rounded" alt="">
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-12 col-sm-12">
                <h6>Home / Camay</h6>
                <h3>Camay Chik Natural</h3>
                <h2>159.99 Tk</h2>
                <Select>
                    <option>S</option>
                    <option>M</option>
                    <option>L</option>
                    <option>XL</option>
                    <option>XXL</option>
                </Select>
            </div>
        </div>
    </div>


    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
        var MainImg = document.getElementById('MainImg');
        var smallimg = document.getElementsByClassName('small-img');

        var magnify_area = document.getElementById('img-area');

        magnify_area.addEventListener('mousemove', function(event){
            clientX = event.clientX - magnify_area.offsetLeft
            clientY = event.clientY - magnify_area.offsetTop

            mWidth = magnify_area.offsetWidth
            mHeight = magnify_area.offsetHeight

            clientX = clientX / mWidth * 10
            clientY = clientY / mHeight *10

            MainImg.style.transform = 'translate(-'+clientX+'%, -'+clientY+'%) scale(1.5)'
            // MainImg.style.transform = 'translate(-50%, -50%) scale(2)'
        });

        magnify_area.addEventListener('mouseleave', function(){
            MainImg.style.transform = 'translate(0%, 0%) scale(1)'
        });

        smallimg[0].onclick = function() {
            MainImg.src = smallimg[0].src;
        }
        smallimg[1].onclick = function() {
            MainImg.src = smallimg[1].src;
        }
        smallimg[2].onclick = function() {
            MainImg.src = smallimg[2].src;
        }
        smallimg[3].onclick = function() {
            MainImg.src = smallimg[3].src;
        }

    </script>
</body>

</html>
