@extends('layouts.app')
<br /><br /><br /><br />
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (Auth::user()->profile()->count() == 0)
                        PROFILE
                    @else
                        não PROFILE
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>