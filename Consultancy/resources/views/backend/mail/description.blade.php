@extends('layouts.backend')
@section('contents')
<!-- /#left-panel -->
    @include('includes.backend.sidepannel')
    <!-- Left Panel -->
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        @include('includes.backend.header')
        <!-- Header-->
        <div class="breadcrumbs">
            <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1> Read Mail</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Mail</a></li>
                            <li><a href="#">Read</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>    
        <!-- Message-content -->
    <div class="col-lg-12">
       <div class="card">
          <div class="card-body card-block">
                 <h6>{{$mail->subject}}</h6>
                 <h6>From: {{$mail->email}}
                  <span class="mailbox-read-time pull-right">{{$mail->created_at->format('d M Y')}}</span></h6>
              <div class="mailbox-read-message"><br>
                 <p>{{$mail->description}}</p>
                  <p>Thanks,<br>{{$mail->name}}</p>
              </div>
          </div>
       </div>
    </div>
<!--  End Message-content -->
    <script>
    $('.delete-slider').click(function(e){
        e.preventDefault() // Don't post the form, unless confirmed
        if (confirm('Are you sure?')) {
            // Post the form
            $(e.target).closest('form').submit() // Post the surrounding form
        }
    });
</script>
@endsection

