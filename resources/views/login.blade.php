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
        <form action="{{route('login')}}" method="get" enctype="Content-Type/application/json" name="test">
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


            <input type="" name="email"  id="email" class="form-control" placeholder="email...">
        </div>
        <br/>

        <div class="text">


            <input type="password" name="password"  id="password" class="form-control" placeholder="Password...">
        </div>


            <button type="submit" name="submit" class="btn btn-primary btn-block mt-4">
               Login
            </button>
            <br/>



</div>

</div>


        </form>






</body>



</html>
</script>
