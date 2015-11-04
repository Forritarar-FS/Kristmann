@extends('app')

@section('content')
<html>
<head>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

 <title>Responsive 'Flat Profile' HTML Portfolio Template</title>
 <link href="css/demo.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="../css/jqbar.css" />
 <link rel="stylesheet" type="text/css" href="../css/bootstrap-responsive.css">


 <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,600' rel='stylesheet' type='text/css'>

 <link rel="stylesheet" type="text/css" href="../css/style.css">

 <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
   <link rel="stylesheet" type="text/css" href="../css/simpletextrotator.css" />

   <!--[if lt IE 9]>
     <style>
       .rw-wrapper{ display: none; }
       .rw-sentence-IE{ display: block;  }
     </style>
 <![endif]-->
</head>
<body >

 <div class="container topbottom">
   <!-- Modal -->

   <div class="row-fluid">

     <div class="span5">
       <img src="../img/avatar.png" alt="Profile Avatar"  class="avatar">

       <div class="navigation">
         <div>
           <ul>
             <li>
               <img src="../img/about-icon.png">
               <a href="indextest2.html">Um Mig</a>
             </li>
             <li>
               <img src="../img/about-icon.png">
               <a>breyta um mynd</a>
               <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Velja Mynd</button>
               <!-- Modal content-->
             </li>
             <li>
               <img src="../img/about-icon.png">
               <a href="#">Breyta lýsingu</a>
           </ul>
         </div>
       </div>
     </div>

     <div class="span7 homeabout">
       <div class="person">
         <span class="name">{{ $user->username }}</span>
       </div>
       <div class="desciption home">
         <article>
           {{ $user->description}}
         </article>

           </div>
         </div>
       </div>

       <div class="modal" id="myModal" role="dialog">
         <div class="modal-dialog">

           <!-- Modal content-->
           <div class="modal-content">
             <div class="modal-header">
               <h4 class="modal-title">Modal Header</h4>
             </div>
             <div class="modal-body">
               <p>Veldu nýja mynd</p>
               <form action="/setphoto">
                 <input type="file" name="picture" accept="image/*">
                 <input type="submit" value="Staðfesta Mynd">
               </form>
             </div>

             <div class="modal-footer">
               <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
             </div>
           </div>

         </div>
       </div>

     </div>

   </div>
 </div>
</body>


</html>

@stop
