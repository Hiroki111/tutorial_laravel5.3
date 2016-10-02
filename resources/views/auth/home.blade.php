@extends('auth.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    Menu
                </div>
                <div class="adminmenu">
                    <ul>
                        <li><a href="/admin/entries">Entries</a></li>
                        <li><a href="/admin/settings">Settings</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
