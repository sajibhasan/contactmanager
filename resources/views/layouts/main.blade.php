<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Mycontact</title>

    <!-- Bootstrap -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/css/custom.css" rel="stylesheet">
    <link href="/assets/css/jasny-bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <!--navbar-->
     <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
          <div class="navbar-header">
           <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand text-uppercase" href="{{route('contacts.index')}}">
              My <strong>contact</strong>
            </a>
          </div>
          <!--/.navbar-header-->
          <div class="collapse navbar-collapse" id="navbar-collapse">
              <div class="nav navbar-right navbar-btn">
                  <a href="{{ route('contacts.create') }}" class="btn btn-default">
                  <i class="glyphicon glyphicon-plus"></i>
                  Add Contact</a>
              </div>
          </div>
        </div>
    </nav>

    <!--content-->

    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <div class="list-group">
              
             <?php $slected_group = Request::get("group_id") ?>
             
            <a href="{{route('contacts.index')}}" class="list-group-item {{ empty($slected_group) ? 'active' : '' }}">All Contact <span class="badge">{{ App\Contact::count()}}</span></a>
            
            @foreach(App\Group::all() as $group)
            
                <a href="{{ route('contacts.index', ['group_id'=>$group->id ]) }}" class="list-group-item {{ $slected_group == $group->id ? 'active' : '' }}">{{ $group->name }} <span class="badge">{{ $group->contact->count()}}</span></a>
            @endforeach
          </div>
        </div> <!--/.col-md-3-->

        <div class="col-md-9">
            @if(session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
            @endif
         @yield('content')

        </div>
      </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/jasny-bootstrap.min.js"></script>
    <script>
      $("#add-new-group").hide();
      $('#add-group-btn').click(function(){
        $("#add-new-group").slideToggle(function(){
          $('#new_group').focus();
        });
        return false;
      });
    </script>
  </body>
</html>