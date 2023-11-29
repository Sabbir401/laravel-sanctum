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

        #img-area:hover {
            color: #fd9a6ce5;
            box-shadow: 2px 2px 15px #fd9a6ce5;
            transform: scale(1.03);
            cursor: zoom-in;
        }

        .small-img:hover {
            color: #fd9a6ce5;
            box-shadow: 2px 2px 15px #fd9a6ce5;
            transform: scale(1.03);
            border-radius: 5px;
            cursor: pointer;
        }

        #img-area {
            overflow: hidden;
        }
    </style>


</head>

<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-5 col-md-12 col-sm-12 ml-3">
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

            <div class="col-lg-6 col-md-12 col-sm-12 ml-5">
                <h6>Home / Camay</h6>
                <h3>CAMAY CLASSIC 72X125G</h3>
                <h2></h2>

                <table>
                    <tr>
                        <td>Product Code</td>
                        <td>69636664</td>
                    </tr>
                    <tr>
                        <td>Category</td>
                        <td>SKIN CARE</td>
                    </tr>
                    <tr>
                        <td>Pack Size</td>
                        <td>125g</td>
                    </tr>
                    <tr>
                        <td>Format</td>
                        <td>BODY CLEANSING</td>
                    </tr>
                    <tr>
                        <td class="pr-4">Country Of Origin</td>
                        <td>INDONESIA</td>
                    </tr>
                </table>
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
        var ImgArea = document.getElementById('img-area');
        var MainImg = document.getElementById('MainImg');
        var smallimg = document.getElementsByClassName('small-img');

        ImgArea.addEventListener('mousemove', (e) => {
            const x = e.clientX - e.target.offsetLeft;
            const y = e.clientY - e.target.offsetLeft;

            console.log(x,y);

            MainImg.style.transformOrigin = `${x}px ${y}px`;
            MainImg.style.transform = "scale(1.5)"
        });

        ImgArea.addEventListener('mouseleave', () => {
            MainImg.style.transformOrigin = "center";
            MainImg.style.transform = "scale(1)"
        })



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
