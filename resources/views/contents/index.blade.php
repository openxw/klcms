@extends('layouts.app')

@section('content')
<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">
      <div class="card-header">
        <h1>
          Content
          <a class="btn btn-success float-xs-right" href="{{ route('contents.create') }}">Create</a>
        </h1>
      </div>

      <div class="card-body">
        @if($contents->count())
          <table class="table table-sm table-striped">
            <thead>
              <tr>
                <th class="text-xs-center">#</th>
                <th>Title</th> <th>Body</th> <th>User_id</th> <th>Category_id</th> <th>Reply_count</th> <th>View_count</th> <th>Last_reply_user_id</th> <th>Order</th> <th>Excerpt</th> <th>Slug</th>
                <th class="text-xs-right">OPTIONS</th>
              </tr>
            </thead>

            <tbody>
              @foreach($contents as $content)
              <tr>
                <td class="text-xs-center"><strong>{{$content->id}}</strong></td>

                <td>{{$content->title}}</td> <td>{{$content->body}}</td> <td>{{$content->user_id}}</td> <td>{{$content->category_id}}</td> <td>{{$content->reply_count}}</td> <td>{{$content->view_count}}</td> <td>{{$content->last_reply_user_id}}</td> <td>{{$content->order}}</td> <td>{{$content->excerpt}}</td> <td>{{$content->slug}}</td>

                <td class="text-xs-right">
                  <a class="btn btn-sm btn-primary" href="{{ route('contents.show', $content->id) }}">
                    V
                  </a>

                  <a class="btn btn-sm btn-warning" href="{{ route('contents.edit', $content->id) }}">
                    E
                  </a>

                  <form action="{{ route('contents.destroy', $content->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Delete? Are you sure?');">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="DELETE">

                    <button type="submit" class="btn btn-sm btn-danger">D </button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {!! $contents->render() !!}
        @else
          <h3 class="text-xs-center alert alert-info">Empty!</h3>
        @endif
      </div>
    </div>
  </div>
</div>

@endsection
