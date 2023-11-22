<!doctype html>
<html lang="en">
  <head>
    <title>User Trash</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <style>
		table {
			font-size: 18px;
			text-align: center;
		}
		tr:nth-child(even) {
			background-color: #D6EEEE;
		}
		th{
			background-color: #04AA6D;
			border-radius: 5px;
         color: white;
         position: sticky;
         position: -webkit-sticky;
		}
      /* tr:hover {
         background-color: rgb(156, 215, 153);
      } */

      td:hover {
         background-color: #04AA6D;
      }

      td{
         border: 2px solid white;
      }
		.text{
			color: white;
			text-decoration: none;
		}
		input[type="text"]{
		padding: 10px;
		width: 40%;
        margin-left: 10px;
		}
		.bt{
		    border-radius: 5px;
		    padding: 2px 5px;
			 margin: 2px;
		    cursor: pointer;
		}

	</style>
  <body>
	<!-- <a href="admin_work.php"><button class="bt">Back</button></a> -->
    <div class="container">
        <h1 style="text-align: center; color: green; font-size: 40px;">All Users</h1>
        <input type="text" name="" id="myInput" placeholder="Enter Name" onkeyup="searchFun()">
        <a href="{{ url('user') }}"><button class="btn btn-primary">User Information</button></a>
        <table style="width:97%; margin: 10px;" id="myTable">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Operation</th>
            </tr>
            @foreach ($site_user as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->Phone_number }}</td>
                    <td>

                        <a href="{{ route('site_user.restore', ['id' => $user->id]) }}">
                            <button class="btn btn-success bt"> Restore</button>
                        </a>
                        <a href="{{ route('site_user.delete', ['id' => $user->id]) }}">
                            <button class="btn btn-danger bt">Delete</button>
                        </a>

                    </td>
                </tr>
            @endforeach
        </table>
        <div>

        </div>
    </div>
	<script type="text/javascript">
		const searchFun = () =>{
			let filter = document.getElementById('myInput').value.toUpperCase();
			let myTable = document.getElementById('myTable');
			let tr = myTable.getElementsByTagName('tr');

			for(var i=0;i<tr.length;i++){
				let td = tr[i].getElementsByTagName('td')[1];

				if(td){
					let textvalue = td.textContent || td.innerHTML;
					if(textvalue.toUpperCase().indexOf(filter) > -1){
						tr[i].style.display = "";
					}else{
						tr[i].style.display = "none";
					}
				}
			}
		}
	</script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
