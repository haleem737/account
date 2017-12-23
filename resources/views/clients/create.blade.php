<!-- extend master layout -->
@extends('layouts.master')

<!-- page title -->
@section('title')
Add New Client
@endsection('title')

<!-- custome css -->
@section('style')
<link href="{{ asset('css/new-client.css') }}" rel="stylesheet">
@endsection('style')

<!--Page Content -->
@section('content')

<!-- new client form -->
<main>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                
                <div class="form-new-client">

                    <div class="form-group">
                        <h4>Add New Client</h4>
                    </div>

                    <!-- begining of add client form -->
                    <form action='/clients' method='POST'>
                    {{ csrf_field() }}
                
                        <!-- client full name -->
                        <div class="form-group">
                            <input type="text" name='full_name' class="form-control chat-input" placeholder="Full Name" />
                        </div> 

                        <!-- company name -->
                        <div class="form-group">
                            <input type="text" name='co_name' class="form-control chat-input" placeholder="Company Name" />
                        </div> 

                        <!-- tel -->
                        <div class="form-group">
                            <input type="text" name='tel' class="form-control chat-input" placeholder="Tel" />
                        </div> 

                        <!-- mobile -->
                        <div class="form-group">
                            <input type="text" name='mobile' class="form-control chat-input" placeholder="Mobile" />
                        </div> 

                        <!-- email -->
                        <div class="form-group">
                            <input type="text" name='email' class="form-control chat-input" placeholder="Email" />
                        </div> 

                        <!-- SUBMIT NEW CLIENT -->
                        <input type='submit' value='APPLY' class='btn btn-success pull-right'>
                        <div class="clearfix"></div>
                        
                    </form>


                </div>

            </div>
        </div>
    </div>
</main>

@endsection('content')
