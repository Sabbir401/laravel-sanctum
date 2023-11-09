<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.rtl.min.css">
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
		border-radius: 10px;
		width: 30%;
		}
		.bt{
		    border-radius: 5px;
		    padding: 2px 5px;
			 margin: 2px;
		    cursor: pointer;
		}
	</style>
</head>
<body>
	<!-- <a href="admin_work.php"><button class="bt">Back</button></a> -->
	<h1 style="text-align: center; color: green; font-size: 40px;">All Register Doctors</h1>
	<input type="text" name="" id="myInput" placeholder="Enter Name" onkeyup="searchFun()">

	<table style="width:97%; margin: 10px;" id="myTable">
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Email</th>
            <th>Phone</th>
			<th>Unit/App. Number</th>
			<th>Street Address</th>
			<th>Address</th>
			<th>City</th>
            <th>Postal Code</th>
			<th>Country</th>
            <th>Operation</th>
		</tr>
      <tr>
			<td>ID</td>
			<td>Name</td>
			<td>Username</td>
			<td>Email</td>
			<td>Birthdate</td>
			<td>Gender</td>
			<td>Phone</td>
			<td>Degree</td>
			<td>Address</td>
         <td>
            <button class="btn btn-primary bt"><a href="update_doc.php?upid='.$id.'" class="text">Update</a></button>
            <button class="btn btn-danger bt"><a href="del_doc.php?delid='.$id.'" class="text"> Delete</a></button>
         </td>
		</tr>



	</table>

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
</body>
</html>
