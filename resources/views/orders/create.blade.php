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

body{
background:#f1f1f1;
}

#order_no{
margin:60px;
}

#header{
margin-bottom:30px;
}

#controls{
margin-left:60px;
margin-bottom:10px;
}

a[name=delete]{
padding:10px;
background:lightgray;
color:black;
}

a[name=delete]:hover{
padding:10px;
background:darkgray;
color:white;
}

a[name=add-row]{
padding:10px;
background:lightgray;
color:black;
}

a[name=add-row]:hover{
padding:10px;
background:darkgray;
color:white;
}

#table-header{
background:#8e9999;
color:white;
line-height:50px;
font-size:1.2em;
font-weight: normal;
border-bottom: 5px solid #f1f1f1;
}

</style>
@endsection('style')

<!--Page Content -->
@section('content')

<div class='container-fluid'>

    <!-- order no -->
    <div class='row' id='order_no'>
        <div class='col-md-12'>
            <h2 align='center'>JOB ORDER NO <span style='color:red'><b>#{{$newOrderNum}}</b></span></h2>
        </div>
    </div>

    <div class='row' id='header'>

        <!-- search client name -->
        <div class='col-md-7 offset-1'>

            <div class='col-md-7'>
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

    <!-- data input table controls -->
    <div class='text-left' id='controls'>
        <a href='#' name='add-row' class="control fa fa-plus fa-lg btn-md"> ADD</a>
        <a href='#' name='delete' class="control fa fa-trash fa-lg btn-md"> DEL</a>
    </div>

    <!-- table div -->
    <div class='row' style='padding:0 60px'>

        <div class='col-md-12'>

            <!-- table -->
            <table id='order-table' class='talbe-striped'>
            
                    <!-- table header -->
                    <tr id='table-header' align='center'>
                    
                        <th class='col-md-.1' style='font-weight:normal'>#</th>
                        <th class='col-md-4' style='font-weight:normal'>Item Description</th>
                        <th class='col-md-1' style='font-weight:normal'>Paper</th>
                        <th class='col-md-.7' style='font-weight:normal'>Colors</th>
                        <th class='col-md-1' style='font-weight:normal'>Copies</th>
                        <th class='col-md-1' style='font-weight:normal'>Serial</th>
                        <th class='col-md-1' style='font-weight:normal'>Qty</th>
                        <th class='col-md-.8' style='font-weight:normal'>U Price</th>
                        <th class='col-md-1' style='font-weight:normal'>Total</th>
                        <th class='col-md-1' style='font-weight:normal'>Cost</th>
                    
                    </tr>
                
                    <!--table inputs  -->
                    <tr>

                        <td>
                            <label class="custom-control custom-checkbox">
                                <input name="item-row" type="checkbox" class="custom-control-input">
                                <span class="custom-control-indicator"></span>
                                <span class="custom-control-description row-index"></span>
                            </label>
                        </td>

                        <td><input type='text' class='col-md-12 form-control form-control-lg' autocomplete="off" ></td>
                        <td><input type='text' class='col-md-12 form-control form-control-lg' autocomplete="off" ></td>
                        <td><input type='text' class='col-md-12 form-control form-control-lg' autocomplete="off" ></td>
                        <td><input type='text' class='col-md-12 form-control form-control-lg' autocomplete="off" ></td>
                        <td><input type='text' class='col-md-12 form-control form-control-lg' autocomplete="off" ></td>
                        <td><input type='text' class='col-md-12 form-control form-control-lg' autocomplete="off" ></td>
                        <td><input type='text' class='col-md-12 form-control form-control-lg' autocomplete="off" ></td>
                        <td><input type='text' class='col-md-12 form-control form-control-lg' autocomplete="off" ></td>
                        <td><input type='text' class='col-md-12 form-control form-control-lg' autocomplete="off" ></td>

                    </tr>
                            
            </table>

        </div>

    </div>

    <!-- footer -->
    <div class="fixed-bottom">fotter here</div>

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


// input data table functions
// set first inputs row index
var row_index = 1;
$('.row-index').html(row_index);

// total of input rows
var total_ipnut_rows = 1;

// define action var to apply a function when control button clicked
var action;

// check the clicked buttion & fire the required function
$(document).on('click', '.control' ,function() {

    action = $(this).attr('name');

    // add row buttion is clicked
    if(action == 'add-row'){
        
        row_index++;

        var addRow =  jQuery(


                    '<tr> <td><label class="custom-control custom-checkbox"><input name="item-row" type="checkbox" class="custom-control-input"><span class="custom-control-indicator"></span><span class="custom-control-description row-index">' + row_index + '</span></label></td>' + 
                    '<td><input type="text" class="col-md-12 form-control form-control-lg" autocomplete="off" ></td>' +
                    '<td><input type="text" class="col-md-12 form-control form-control-lg" autocomplete="off" ></td>' +
                    '<td><input type="text" class="col-md-12 form-control form-control-lg" autocomplete="off" ></td>' +
                    '<td><input type="text" class="col-md-12 form-control form-control-lg" autocomplete="off" ></td>' +
                    '<td><input type="text" class="col-md-12 form-control form-control-lg" autocomplete="off" ></td>' +
                    '<td><input type="text" class="col-md-12 form-control form-control-lg" autocomplete="off" ></td>' +
                    '<td><input type="text" class="col-md-12 form-control form-control-lg" autocomplete="off" ></td>' +
                    '<td><input type="text" class="col-md-12 form-control form-control-lg" autocomplete="off" ></td>' +
                    '<td><input type="text" class="col-md-12 form-control form-control-lg autocomplete="off" "></td> </tr>' );

        $('#order-table').append(addRow);
        
        // enable delete inpts row button
        total_ipnut_rows++;
        $('[name="delete"]').prop('disabled', false);

    }

    // remove row buttion is clicked
    if(action == 'delete'){

        if(row_index == 1){
            return false;
            $('[name="delete"]').prop('disabled', true);
        }
            
        // remove inputs row
        $('table tr').has('input[name="item-row"]:checked').remove();


        // reset input rows index
        $('.row-index').each(function( index ) {
            $(this).html(index + 1);
        });

        row_index = $('.row-index').length;

    }
});



});
</script>

@endsection('script')

@endsection('content')