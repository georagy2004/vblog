@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                    @include('inc.messages')
                    <div class="panel-body">一封激活邮件已经发出，请前往邮箱 <a href={{route('sendMail')}}>没有收到？</a></div>

                    @else
                    <div class="panel-body">一封激活邮件已经发出，请前往邮箱 <a href={{route('sendMail')}}>没有收到？</a></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
