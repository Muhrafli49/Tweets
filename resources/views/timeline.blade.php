<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="card bg-white">
                <div class="card-body">
                    <form action="{{ route('tweets.store') }}" method="post">
                        @csrf
                        <textarea name="content" class="textarea text area-bordered w-full" placeholder="Apa Yang Anda Pikirkan" rows="3"></textarea>
                        <input type="submit" value="Tweet" class="btn btn-primary ">
                    </form>
                </div>
            </div>
            @foreach ($tweets as $tweet)
                <div class="card my-4 bg-white">
                    <div class="card-body">
                        <h2 class="text-xl font-bold">{{ $tweet->user->name }}</h2>
                        <p>{{ $tweet->content }}</p>
                        <div class="text-end">
                            @if ($tweet->user_id == auth()->id())
                                <a href="{{ route('tweets.edit', $tweet->id) }}" class="btn btn-info btn-sm hover:bg-blue-500"onclick="return confirm('Are you sure you want to edit this tweet?');">Edit</a>
                            @endif
                            @if ($tweet->user_id == auth()->id())
                                <form action="{{ route('tweets.destroy', $tweet->id) }}" method="post" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this tweet?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-error btn-sm hover:bg-red-500" onclick="return confirm('Are you sure you want to delete this tweet?');">Hapus</button>
                                </form>
                            @endif
                            <span class="text-sm">{{ $tweet->created_at->diffForHumans() }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        
        
        </div>
    </div>
</x-app-layout>
