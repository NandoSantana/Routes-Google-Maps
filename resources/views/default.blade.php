<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="description" content="">
   <meta name="author" content="">
   <title>Programar Rota</title>
   <!-- Bootstrap Core CSS -->
   <link href="{!! asset('css/bootstrap.min.css') !!}" rel="stylesheet">

</head>
<body>
   <div id="wrapper">
       <!-- Navigation -->
           @include('header')
       <div id="" class="container">
           <br/><br/><br/>
            <div class="row justify-content-center">
                <form method="POST" action="{{url('/upload')}}">     
                    <div class="col-12">
                        <label for="exampleFormControlFile1">Upload de arquivo CSV</label>
                    </div>
                    <div class="col-12">
                        <input type="file" class="" id="exampleFormControlFile1">
                        <!-- <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}"> -->
                        @csrf  

                        @method('POST')
                    </div>
                    <br/>
                    <div class="col-12">
                        <input type="submit" class="btn btn-primary" value="Programar rota">
                    </div>
                </form>
            </div>
      </div>
       <!-- /#page-wrapper -->
   </div>
   <!-- /#wrapper -->
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
   
   <!-- jQuery -->
   <!-- <script src="{!! asset('theme/vendor/jquery/jquery.min.js') !!}"></script> -->
   <!-- Bootstrap Core JavaScript -->
   <script src="{!! asset('js/bootstrap.min.js') !!}"></script>
  
</body>
</html>
