<!-- extend master layout -->
@extends('layouts.master')

<!-- page title -->
@section('title')
Create New Order
@endsection('title')

<!-- custome css -->
@section('style')
<style>
/* add style for dropdown client search results */
.active{background:skyblue}
.dropdown-item:hover{background:skyblue}
</style>
@endsection('style')

<!--Page Content -->
@section('content')

<div class='container-fluid'>

    <!-- order no -->
    <div class='row'>
        <div class='col-md-12'>
            <h2 align='center'>JOB ORDER NO <span style='color:red'><b>#{{$newOrderNum}}</b></span></h2>
        </div>
    </div>

    <!-- search client name -->
    <div class='row'>

        <div class='col-md-7 offset-1'>

            <div class='col-md-6'>
                <div class="form-group">
                    <label for="formGroupExampleInput"><h4>Client Name</h4></label>
                    <input type="text" name="client-name" id="client-name" class="form-control form-control-lg" autocomplete="off" placeholder="search" />
                </div>
            </div>

        </div>

        <!-- date -->
        <div class='col-md-3'>
            <h4>Date: {{$date}}</h4>
        </div>

    </div>

    <div class='row'>


    </div>

</div>

<!-- script -->
@section('script')

<script>
$(document).ready(function(){

    // using typehahead plugin to search for client from database
    $('#client-name').typeahead({
        highlight: true,
        source: function(query, result){
         $.ajax({
          url:"{{ URL::to('find-client') }}",
          method:"GET",
          data:{query:query},
          dataType:"json",
          success:function(data)
          {
           result($.map(data, function(client){
            return client;
           }));
          }
         })
        }
       });

});
</script>

@endsection('script')

@endsection('content')