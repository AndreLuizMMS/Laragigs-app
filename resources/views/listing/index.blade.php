<x-layout>
  @include('partials._hero')
  @include('partials._search')

  @if (request('tag') || request('search'))
    <a href="/">
      <button class="border-white text-black m-4 bg-laravel py-2 px-4 rounded-xl ">
        X Clean Filters
      </button>
    </a>
  @endif

  <x-card-wrapper>
    @foreach ($listings as $listingItem)
      <x-listing-card :listingItem="$listingItem" />
    @endforeach
    </div>
  </x-card-wrapper>
  <div class="mt-4">
    {{ $listings->links() }}
  </div>
</x-layout>
