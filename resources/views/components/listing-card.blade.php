@props(['listingItem'])
<div class="bg-gray-50 border border-gray-200 rounded p-6">
  <div class="flex">
    <img class="hidden w-48 mr-6 md:block" src="{{ asset('/images/no-image.png') }}" alt="" />
    <div>
      <a href="/listing/{{ $listingItem->id }}">
        <h3 class="text-2xl">
          {{ $listingItem->title }}
        </h3>
        <div class="text-xl font-bold mb-4">{{ $listingItem->company }} </div>
        <x-listing-tags :listingItem="$listingItem" />
        <div class="text-lg mt-4">
          <i class="fa-solid fa-location-dot"></i> {{ $listingItem->location }}
        </div>
      </a>
    </div>
  </div>
</div>
