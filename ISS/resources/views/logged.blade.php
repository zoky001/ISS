@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    
                   Ovdje mogu pristupiti samo PRIJAVLJENI korisnici. 
                   
                </div>

                <div class="panel-body">
                 

                    Dobro došao  <b> {{ Auth::user()->name }}</b>  !!
                 
                        <br><br>
         <p>Ovo ograničenje je izrađeno na sljedeći način: </p>
         
 
                <pre>
Route::get('/logged_in', 'HomeController@logged')->name('logged')->middleware('auth');
                </pre>

                </div>
                
                
                
       
            </div>
        </div>
    </div>
</div>
@endsection
