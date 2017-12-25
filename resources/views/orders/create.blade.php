<!-- extend master layout -->
@extends('layouts.master')

<!-- page title -->
@section('title')
Add New Client
@endsection('title')

<!-- custome css -->
@section('style')
<style>
.active{background:red}
.active:hover{background:black}
.dropdown-item:hover{background:red}
</style>
@endsection('style')

<!--Page Content -->    
@section('content')

<div class='container-fluid'>

    <!-- order no -->
    <div class='row'>
        <div class='col-md-12'>
            <h2 align='center'>JOB ORDER NO <span style='color:red'><b>#0001</b></span></h2>
        </div>
    </div>

    <!-- search client name -->
    <div class='row'>

        <div class='col-md-7 offset-1'>

            <div class='col-md-6'>
                <div class="form-group">
                    <label for="formGroupExampleInput"><h3>Client Name</h3></label>
                    <input type="text" name="country" id="country" class="form-control form-control-lg" autocomplete="off" placeholder="search" />
                </div>
            </div>

        </div>

        <!-- date -->
        <div class='col-md-3'>
            <h3>Date: {{$date}}</h3>
        </div>

    </div>

    <div class='row'>

  
    </div>

</div>

<!-- script -->
@section('script')

<script>
$(document).ready(function(){

    $('#country').typeahead({
        source: function(query, result)
        {
         $.ajax({
          url:"{{ URL::to('find-client') }}",
          method:"GET",
          data:{query:query},
          dataType:"json",
          success:function(data)
          {
           result($.map(data, function(item){
            return item;
           }));
          }
         })
        }
       });
      
    /*$( function() {
        var availableTags = [
          "ActionScript",
          "AppleScript",
          "Asp",
          "BASIC",
          "C",
          "C++",
          "Clojure",
          "COBOL",
          "ColdFusion",
          "Erlang",
          "Fortran",
          "Groovy",
          "Haskell",
          "Java",
          "JavaScript",
          "Lisp",
          "Perl",
          "PHP",
          "Python",
          "Ruby",
          "Scala",
          "Scheme"
        ];
        $( "#country" ).autocomplete({
          source: "{{ URL::to('find-client') }}"
        });

      } );*/
        

});
</script>

@endsection('script')

@endsection('content')
