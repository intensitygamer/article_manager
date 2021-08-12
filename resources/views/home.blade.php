@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Welcome!') }}
                </div>
            </div>
        </div>
    </div>

        <div class="row">

        <div class="container">

            <div class="col-lg-12 margin-tb">

                    <div class="pull-left">
                        <h2> Articles </h2>
                    </div>

                    <a class="btn btn-success" href="{{ route('create_article') }}" title="Article Project"> <i class="fas fa-plus-circle"></i>Add Article
                    </a>

                </div>

            </div>

    </div>


    <div class="row">
    
        <div class="container">

            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif

            @if ($message = Session::get('errors'))
                <div class="alert alert-danger">

                @foreach ($errors->all() as $message) {

                    <p>{{ $message }}</p>
                
                @endforeach

                </div>
            @endif

            <table class="table table-bordered table-responsive-lg">
                <tr>
                    <th>Article ID</th>
                    <th>Article Title</th>
                     <th>Date Created</th>
                    <th width="280px">Action</th>
                </tr>
                @foreach ($articles as $article)
                    <tr>
                        <td>    {{ $article->id }}</td>
                        <td>    {{ $article->article_name }}</td>
  
                         <td>    {{ ($article->created_at) ? date_format($article->created_at, 'jS M Y') : ''}}</td>
                        <td>
                                <form action="{{ route('delete.article', [ 'id'=> $article->id ]) }}" method="POST" >

                                @csrf
    
                                <a class="btn btn-info" href="{{ route('article.show', $article->id) }}">View</a>    

                                <a class="btn btn-primary"  href="{{ route('edit.article', $article->id) }}">Edit</a>
                                        
                                    <input name="id" type="hidden" name = "article_id" value="{{$article->id}}">

                                    <input type="hidden" name="_method" value="DELETE">

                                    <button type = 'submit' class="btn btn-danger" > Delete </button>

                                </form>
  
                        </td>
                    </tr>
                @endforeach
            </table>

         
            <div class="pull-center">
                <a class="btn btn-danger" href="{{ route('logout') }}" title="Logout"> Logout <i class="fas fa-plus-circle"></i> </a>
            </div>

        </div>

    </div>
    
</div>
@endsection
