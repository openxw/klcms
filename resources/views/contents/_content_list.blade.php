@if (count($contents))
  <ul class="list-unstyled">
    @foreach ($contents as $content)
      <li class="media">
        <div class="media-left">
          {{-- <a href="{{ route('users.show', [$content->user_id]) }}">
            <img class="media-object img-thumbnail mr-3" style="width: 52px; height: 52px;" src="{{ $content->user->avatar }}" title="{{ $content->user->name }}">
          </a> --}}
          <a href="{{ route('contents.show', [$content->id]) }}" title="{{ $content->title }}">
            <img class="media-object img-thumbnail mr-3" style="width: 200px; height: 200px;" src="{{ $content->title_img }}" title="{{ $content->user->name }}">
          </a>
        </div>

        <div class="media-body">

          <div class="media-heading mt-0 mb-1">
            <a href="{{ route('contents.show', [$content->id]) }}" title="{{ $content->title }}">
              {{ $content->title }}
            </a>
            <a class="float-right" href="{{ route('contents.show', [$content->id]) }}">
              <span class="badge badge-secondary badge-pill"> {{ $content->reply_count }} </span>
            </a>
          </div>

          <small class="media-body meta text-secondary">

            <a class="text-secondary" href='{{ route('categories.show', $content->category_id) }}'  title="{{ $content->category->name }}">
              <i class="far fa-folder"></i>
              {{ $content->category->name }}
            </a>

            <span> • </span>
            {{-- <a class="text-secondary" href="{{ route('users.show', [$content->user_id]) }}" title="{{ $content->user->name }}">
              <i class="far fa-user"></i>
              {{ $content->user->name }}
            </a> --}}

              <i class="far fa-user"></i>
              {{ $content->user->name }}

            <span> • </span>
            <i class="far fa-clock"></i>
            <span class="timeago" title="最后活跃于：{{ $content->updated_at }}">{{ $content->updated_at->diffForHumans() }}</span>
          </small>

        </div>
      </li>

      @if ( ! $loop->last)
        <hr>
      @endif

    @endforeach
  </ul>

@else
  <div class="empty-block">暂无数据 ~_~ </div>
@endif
