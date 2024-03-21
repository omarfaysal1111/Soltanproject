<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <title>Scanalyze</title>
    <style>
        .body{

        }
        .container {
            max-width: 80%;
        }
        dl, ol, ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }
        table{
            padding-left:0px !important;
            width: 100%;

  /* border: 1px solid; */
}
.btn{
    background-color: rgb(12,5,61);


}
.btn1{
    background-color: rgb(12,5,61);
width:30% !important;

}

 th {
    padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: rgb(127,117,176);
  color: white;
 }
 td{
    border: 1px solid #ddd;
  padding: 8px;


 }
 .Row{
 display: table;
    width: 100%; /*Optional*/
    table-layout: fixed;
    position: relative;
 }
 tr:nth-child(even){background-color: #f2f2f2; width:100%;}
 tr:hover {background-color: #ddd;width:100%;}

    </style>
</head>
<body >

    <div class="container mt-5">
        <form action="{{route('search')}}" method="get" enctype="Content-Type/application/json" name="test">
            <img style="width:250px; margin-bottom:80px" src='../logo.png'/>
            <br/>

            @csrf
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <strong>{{ $message }}</strong>
            </div>
          @endif
           <div class="Row">

            <div class="text">


            <input type="search" name="search"  id="search" class="form-control" placeholder="Search with National ID here">
        </div>
        <br/>


            <button type="submit" name="submit" class="btn btn-primary btn-block mt-4">
               Search
            </button>
            <br/>



</div>

</div>


        </form>



        <form action="{{route('down')}}" method="get" enctype="Content-Type/application/json" name="test2">

<div  class="container" style="width=70% !important;">
<button type="submit" name="submit" class="btn btn-primary btn-block mt-4" >
               Export Selected

            </button>





<br/>
    <table >
<th></th>
    <th>National ID</th>
    <th>Name</th>

    <th>Behavior</th>

    <th>Radius</th>
    <th>Date</th>

    <th> </th>
    <th> </th>
    <th> </th>
    @foreach($infos as $info)
        <tr>


            <div style="background-color=#ff0000">
            <td><input type="checkbox"class="checkbox" id="checkbox" name="checkboxes[]" value="{{$info->id}}"  ></td><td> {{$info->national_id}}</td> <td>{{$info->name}}</td>  <td> {{$info->kind}}</td><td> {{$info->radius}}</td><td>{{$info->created_at}}</td> <td><a href="/remove/{{$info->id}}"> Remove </a></td></div>
            </tr>


    @endforeach
    <a   type="non" name="non"   id="selectAll" class="btn btn-primary" style="color:#ffffff;margin-bottom:20px;">select All</a>
    <a   type="non" name="non"   id=""href="/removeAll" class="btn btn-primary" style="color:#ffffff;margin-bottom:20px; margin-left:20px">Remove All</a>





</table>
</form>

</body>



</html>
<script>
    $(function() {
        $('#selectAll').click(function() {
            // Toggle checkboxes based on button state
            $('.checkbox').prop('checked', function(_, current) {
                return !current;
            });
        });
    });
</script>
