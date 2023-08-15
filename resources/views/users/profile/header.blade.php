<div class="row mb-5">
    <div class="col-4 text-end">
        @if ($user->avatar)
            <img src="{{ $user->avatar }}" alt="" class="img-thumbnail rounded-circle d-block mx-auto avatar-lg">
        @else
            <i class="fa-solid fa-circle-user d-block icon-lg text-secondary"></i>
        @endif
    </div>
    <div class="col-8">
        <div class="row mb-3">
            <div class="col-auto">
                <h2 class="display-6">{{ $user->name }}</h2>
            </div>

            <div class="col-auto p-2">
                @if ($user->id == Auth::user()->id)
                    <a href="{{ route('profile.edit', Auth::user()->id) }}" class="btn btn-outline-secondary btn-sm fw-bold">Edit Profile</a>
                @else
                    @if($user->isFollowed())
                        <form action="{{ route('follow.destroy', $user->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-secondary btn-sm fw-bold">Following</button>
                        </form>
                    @else
                        <form action="{{ route('follow.store') }}" method="post">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                            <button type="submit" class="btn btn-primary btn-sm fw-bold">Follow</button>
                        </form>
                    @endif
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-auto">
                <strong class="fw-bold">{{ $user->posts->count() }}</strong> {{ $user->posts->count() == 1 ? 'Post' : 'Posts' }}
                {{-- Ternary Operator ~~ condition ? true : false --}}
            </div>
            <div class="col-auto">
                <strong class="fw-bold">{{ $user->followers->count() }}</strong> <a href="{{route('follower.show',$user->id)}}" class="text-dark text-decoration-none">
                    {{ $user->followers->count() == 1 ? 'Follower' : 'Followers' }}
                </a>
            </div>
            <div class="col-auto">
                <strong class="fw-bold">{{ $user->following->count() }}</strong> Following
            </div>
        </div>
        <p class="fw-bold">{{ $user->introduction }}</p>
    </div>
</div>
