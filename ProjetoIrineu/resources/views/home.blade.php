@extends('layouts.app')
<br /><br /><br /><br />
<div class="container">
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <?php    
    header("Location: ../index.php");exit;   
    ?>
</div>