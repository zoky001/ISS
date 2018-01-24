@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Cross site scripting
                </div>

                <div class="panel-body">
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif
                    
                    <p>
                        Izgled koda za ispis: 
                    </p>
                    <br>

                    <img src="{{ asset('images/xss_ranjiv.png') }}" width="491" height="476" alt="xss_ranjiv"/>
                    <br>


                    <p>
                        Upišite sljedeči kod u unos:
                    </p>
                    <pre>{{ $text }}</pre>      


                    <form class="form-horizontal" method="POST" action="{{ route('xss_ranjiv') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Ovdje je sustav ranjiv na XSS napad: </label>

                            <div class="col-md-6">
                            <!--  <input id="email" type="text" class="form-control" name="name" value="{{ old('name') }}" autofocus>
-->
<textarea rows="10" id="email" type="text" class="form-control" name="name"> {{ old('name') }}</textarea>
                               
                                
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

                    <form class="form-horizontal" method="POST" action="{{ route('xss_ranjiv') }}">
                        {{ csrf_field() }}




                        <div class="form-group{{ $errors->has('safe') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Ovdje sustav NIJE  ranjiv na XSS napad: </label>

                            <div class="col-md-6">
                             <textarea rows="10" id="email" type="text" class="form-control" name="safe"> {{ old('safe') }}</textarea>
          

                                @if ($errors->has('safe'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('safe') }}</strong>
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

                    <br>

                    @if (!empty($xss_ranjiv) || !empty($xss_siguran) )
                    <div class="panel-body">


                        <p>
                            Upisali ste sljedeći text: 


                            @if (!empty($xss_ranjiv) )
                            <strong>
                                {!! $xss_ranjiv !!}
                            </strong>
                            @else
                            <strong>
                                {{ $xss_siguran }}
                            </strong>
                            @endif


                        </p>

                    </div>


                    @endif




                </div>
            </div>
        </div>
    </div>
</div>
@endsection
