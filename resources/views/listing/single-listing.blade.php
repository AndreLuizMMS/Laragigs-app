<x-layout>
  <x-single-listing-card :listingItem="$listingItem" />
  @if (auth()->check())
    <div class="space-y-4 md:space-y-0 mx-4 mt-2">
      <div class="flex justify-around bg-gray-50 border border-gray-200 rounded p-6">
        <a href="/edit-job/{{ $listingItem->id }}">
          <i class="fa-solid fa-pencil"></i>
          Edit
        </a>
        <form method="POST" action="/delete-job/{{ $listingItem->id }}">
          @csrf
          @method('DELETE')
          <button class="text-red-500"><i class="fa-solid fa-trash"></i> Delete</button>
        </form>
      </div>
    </div>
  @endif
</x-layout>
