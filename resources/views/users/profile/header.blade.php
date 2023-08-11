<div class="row">
    <div class="col-4">
        @if ($user->avatar)
            <img src="" class="img-thumbnail rounded-circle d-block mx-auto avatar-lg" alt="">
        @else
            <i class="fa-solid fa-circle-user d-block icon-lg text-secondary"></i>
        @endif
    </div>
    <div class="col-8">
        <div class="row mb-3">
            <div class="col-auto">
                <h2 class="display-6 mb-0">
                    {{ $user->name }}
                </h2>
            </div>
            <div class="col-auto p-2">
                @if ($user->id == Auth::user()->id)
                    <a href="#" class="btn btn-outline-secondary btn-sm fw-bold">
                        Edit Profile
                    </a>
                @else
                    <form action="" method="post">
                        @csrf

                        <button type="submit" class="btn btn-primary btn-sm fw-bold">
                            Follow
                        </button>
                    </form>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-auto">
                <strong>{{$user->posts->count()}}</strong> Posts
            </div>
            <div class="col-auto">
                <strong>0</strong> Followers
            </div>
            <div class="col-auto">
                <strong>0</strong> Following
            </div>
        </div>
        <p class="fw-bold">{{$user->description}}</p>
    </div>
</div>
