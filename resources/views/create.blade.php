@extends('layouts.app')

@section('content')

    <div class="row">

        <div class="container">

            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Add New Article</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('articles') }}" title="Go back">Back</i> </a>
                </div>
            </div>
        
        </div>

    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong> There were some problems with your input. </strong> <br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('save_article') }}" method="POST">

        @csrf

        <div class="row" style="margin-left:20px; margin-right:20px;">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Article Title:</strong>
                    <input type="text" name="article_name" class="form-control" placeholder="Article Title">
                </div>
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Article Content:</strong>
                    <textarea name="article_description" class="form-control" cols = 10 row=50></textarea>
                </div>
            </div>
 
 
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Save Article</button>
            </div>
        </div>

    </form>
@endsection
