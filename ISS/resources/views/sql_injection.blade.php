@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">SQL injection</div>

                <div class="panel-body">
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif

                    <p>
                        Upišite sljedeči kod u unos:
                    </p>
                    <pre>
                       {{$someVariable}}
                    </pre>      

                    <div class="panel panel-default">
                        <div class="panel-heading">Ovdje sustav NIJE ranjiv na SQLinjection napad:</div>

                        <div class="panel-body">

                            <p>
                                Izgled upita:
                            </p>
                            <pre>
                        {{$siguranUpit}}
                            </pre>
                            <form class="form-horizontal" method="POST" action="{{ route('SQLinjection_nije_ranjiv') }}">
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

                    <br>
                        <div class="panel panel-default">
                        <div class="panel-heading"> Ovdje JE SUSTAV RANJIV na SQLinjection napad::</div>

                        <div class="panel-body">

                    <br>
                    <p>
                        Izgled upita:
                    </p>
                    <pre>
                        {{$ranjivUpit}}
                    </pre>
                    <form class="form-horizontal" method="POST" action="{{ route('SQLinjection_ranjiv') }}">
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
                        </div></div>

                    @if (!empty($user))
                    <div class="panel-body">


                        <p>
                            Pronađeni korisnik sa imenom
                            <br>
                            @foreach($user as $a)
                            <br>       <strong>
                                USERNAME:
                            </strong>
                            {{ $a -> name }}

                            @endforeach                     



                        </p>

                    </div>


                    @endif




                </div>
            </div>
        </div>
    </div>
</div>
@endsection
