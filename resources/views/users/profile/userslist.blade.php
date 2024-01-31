@extends('layouts.app')

@section('title', 'All Users')

@section('content')

    @foreach ($all_users as $user)
        <div class="row align-items-center mb-3 mt-2">
            <div class="col-auto">
                <a href="{{ route('profile.show', $user->id) }}">
                    @if ($user->avatar)
                        <img src="{{ $user->avatar }}" alt="{{ $user->avatar }}" class="rounded-circle avatar-sm">
                    @else
                        <i class="fa-solid fa-circle-user text-secondary icon-sm"></i>
                    @endif                     
                </a>
            </div>
            <div class="col ps-0 text-truncate">
                <a href="{{ route('profile.show', $user->id) }}" class="text-decoration-none text-dark fw-bold">{{ $user->name }}</a>
            </div>
            <div class="col-auto">
                @if (!$user->isFollowed())
                    <form action="{{ route('follow.store', $user->id) }}" method="post">
                        @csrf
                        <button type="submit" class="btn border-0 bg-transparent p-0 text-primary btn-sm">
                            Follow
                        </button>
                    </form>
                @endif                
            </div>                   
        </div>
    @endforeach




    {{-- @foreach ($all_users as $user)
    <div class="row align-items-center mb-3 mt-2">
        <div class="col-auto">
            <a href="{{ route('profile.show', $user->id) }}">
                @if ($user->avatar)
                    <img src="{{ $user->avatar }}" alt="{{ $user->avatar }}" class="rounded-circle avatar-sm">
                @else
                    <i class="fa-solid fa-circle-user text-secondary icon-sm"></i>
                @endif                     
            </a>
        </div>
        <div class="col ps-0 text-truncate">
            <a href="{{ route('profile.show', $user->id) }}" class="text-decoration-none text-dark fw-bold">{{ $user->name }}</a>
        </div>
        <div class="col-auto">
            @if ($user->isFollowed())
                <form action="{{ route('follow.destroy', $user->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn border-0 bg-transparent p-0 text-secondary btn-sm">
                        Following
                    </button>
                </form>
            @else
                <form action="{{ route('follow.store', $user->id) }}" method="post">
                    @csrf
                    <button type="submit" class="btn border-0 bg-transparent p-0 text-primary btn-sm">
                        Follow
                    </button>
                </form>
            @endif
            
        </div>                   
        </div>
    @endforeach --}}
@endsection

