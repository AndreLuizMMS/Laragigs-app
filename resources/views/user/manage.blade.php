<x-layout>
  <main>
    <!-- Search -->
    <form action="/">
      <div class="relative border-2 border-gray-100 m-4 rounded-lg">
        <div class="absolute top-4 left-3">
          <i class="fa fa-search text-gray-400 z-20 hover:text-gray-500"></i>
        </div>
        <input type="text" name="search" class="h-14 w-full pl-10 pr-20 rounded-lg z-0 focus:shadow focus:outline-none"
          placeholder="Search Laravel Gigs..." />
        <div class="absolute top-2 right-2">
          <button type="submit" class="h-10 w-20 text-white rounded-lg bg-red-500 hover:bg-red-600">
            Search
          </button>
        </div>
      </div>
    </form>

    <div class="mx-4">
      <div class="bg-gray-50 border border-gray-200 p-10 rounded">
        <header>
          <h1 class="text-3xl text-center font-bold my-6 uppercase">
            Manage Gigs
          </h1>
        </header>
        <table class="w-full table-auto rounded-sm">
          @foreach ($userListings as $item)
            <x-manage-listing-card :item="$item" />
          @endforeach
        </table>
      </div>
    </div>
  </main>
</x-layout>
