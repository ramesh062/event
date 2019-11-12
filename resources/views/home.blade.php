@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                
                    You are logged in!
                    @if(session('current_user'))
                    <pre>
                    print_r(session('current_user'));
                @endif
                </div>
            </div>
        </div>
    </div>
</div>

<script src="//js.pusher.com/2.2/pusher.min.js"></script>
<script type="text/javascript">
    
    var pusher = new Pusher('ade2db191a42f8870a6d');
    var channel = pusher.subscribe('action-did-occur');

    channel.bind('App\Events\Login', function(data) {
        console.log('event run');
       console.log(data);
    });

</script>
@endsection
