@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            
            
            @if(!empty($user))
                    <div class="panel panel-default">
                <div class="panel-heading">Bok!</div>

                <div class="panel-body">
                    
                    Pozdrav gospodine <b>{{$user}} </b>! <br>
             Hvala što sa povjerenjem koristite naše stranice.
                </div>
            </div>
            @endif
            <div class="panel panel-default">
                  <div class="panel-heading">CSRF - ovdje POST zahtjev <b>SADRŽI</b> CSRF token</div>

                <div class="panel-body">
                    
                    
                    <form class="form-horizontal" method="POST" action="{{ route('CSRF_ranjiv') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Username:  </label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="name" value="{{ old('name') }}" autofocus>

                                @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>




                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Pošalji
                                </button>


                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="panel panel-default">
             
  <div class="panel-heading">CSRF - ovdje POST zahtjev <b>NE SADRŽI</b>  CSRF token</div>
                <div class="panel-body">
                    
                    
                    <form class="form-horizontal" method="POST" action="{{ route('CSRF_ranjiv') }}">
                      

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Username:  </label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="name" value="{{ old('name') }}" autofocus>

                                @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>




                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Pošalji
                                </button>


                            </div>
                        </div>
                    </form>
                </div>
            </div>
            
         
        </div>
    </div>
</div>
@endsection
