@extends('layouts.between')

@section('content')
    <form class="form-signin" action="{{ route('login.store') }}" method="post">
        {!! csrf_field() !!}
        <h2 class="form-signin-heading">Inloggen</h2>
        <div class="login-wrap">
            <div class="user-login-info">
                <input type="text" name="username" class="form-control" placeholder="Gebruikernaam" autofocus>
                <input type="password" name="password" class="form-control" placeholder="Wachtwoord">
            </div>
            <label class="checkbox">
                <span class="pull-right">
                    <a data-toggle="modal" href="#myModal"> Wachtwoord vergeten?</a>
                </span>
            </label>
            <button class="btn btn-lg btn-login btn-block" type="submit">Log in</button>
        </div>

        <!-- Modal -->
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Wachtwoord vergeten?</h4>
                    </div>
                    <div class="modal-body">
                        <p>Geef je email door en we restten je wachtwoord.</p>
                        <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">

                    </div>
                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                        <button class="btn btn-success" type="button">Verzenden</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- modal -->

    </form>
@stop
