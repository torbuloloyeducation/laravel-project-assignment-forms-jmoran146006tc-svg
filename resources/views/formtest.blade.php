<x-layout>
  <div class="space-y-12">
    <div class="border-b border-white/10">
      <div class="mt-2 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-12 p-10 bg-gray-800 rounded-lg">
        <div class="sm:col-span-4">

          <form method="POST" action="/formtest">
            @csrf
            <label for="email" class="block text-sm/6 font-medium text-white">Email</label>
            <div class="mt-2">
              <div class="flex items-center rounded-md bg-white/5 pl-3 outline-1 -outline-offset-1 outline-white/10 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-500">
                <input id="email" type="email" name="email" placeholder="juandelacruz@umindanao.edu.ph" class="block min-w-0 grow bg-transparent py-1.5 pr-3 pl-1 text-base text-white placeholder:text-gray-500 focus:outline-none sm:text-sm/6" />
              </div>
            </div>
            <div class="mt-3 flex items-center gap-x-6 justify-end">
              <button type="submit" class="rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold text-white focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Save</button>
            </div>
          </form>

          <div class="mt-3 p-5">
            <h2 class="text-lg font-semibold text-white">Emails</h2>
            <ul>
              @foreach ($emails as $email)
              <li class="flex items-center justify-between text-sm p-1 text-white">
                <span>{{ $email }}</span>

                <form method="POST" action="/formtest">
                  @csrf
                  @method('DELETE')
                  <input type="hidden" name="email" value="{{ $email }}">
                  <button type="submit" class="text-red-400 hover:text-red-300 text-xs ml-4">
                    Delete
                  </button>
                </form>
              </li>
              @endforeach
            </ul>
          </div>
          @if (session('success'))
          <div class="p-3 text-sm text-green-400">
            {{ session('success') }}
          </div>
          @endif
          @if (session('warning'))
          <div class="p-3 text-sm text-yellow-400">
            {{ session('warning') }}
          </div>
          @endif
          @error('email')
          <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
          @enderror
        </div>
      </div>
    </div>
  </div>
</x-layout>