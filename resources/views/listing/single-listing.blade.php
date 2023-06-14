<x-layout>
  <x-single-listing-card :listingItem="$listingItem" />
  <x-card-wrapper>
    <a href="/edit-job/{{ $listingItem->id }}">
      <i class="fa-solid fa-pencil "></i>Edit
    </a>

    <form action="/delete-job/{{ $listingItem->id }}" method="POST">
      @csrf
      @method('DELETE')
      <button>
        <i class="fa-solid fa-trash "></i>
        <span>
          Delete
        </span>
      </button>
    </form>

  </x-card-wrapper>
</x-layout>
