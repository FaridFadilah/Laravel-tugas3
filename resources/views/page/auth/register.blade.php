<x-app-layout>
  <x-slot:title>{{ __("Register") }}</x-slot>
  <x-slot:content>
    <div class="my-10 container mx-auto w-[700px]">
      <form action="{{ route('register') }}" method="POST" class="flex items-center flex-col p-8 gap-8 border-2 -tracking-tighter border-[#1C315E] rounded-lg">
        @csrf
        <h1 class="text-4xl font-bold text-[#1C315E]">{{ __('register') }}</h1>
        <input type="text" autocomplete="off" name="name" placeholder="Username" class="border-2 w-full rounded-lg border-[#1C315E] p-5 placeholder:text-[#1C315E]">
        @error('name')
          <p class="text-red-500 italic">{{ $message }}</p>
        @enderror
        <input type="email" autocomplete="off" name="email" placeholder="Email" class="border-2 w-full rounded-lg border-[#1C315E] p-5 placeholder:text-[#1C315E]">
        @error('email')
          <p class="text-red-500 italic">{{ $message }}</p>
        @enderror
        <input type="password" autocomplete="off" name="password" placeholder="Password" class="border-2 w-full rounded-lg border-[#1C315E] p-5 placeholder:text-[#1C315E]">
        @error('password')
          <p class="text-red-500 italic">{{ $message }}</p>
        @enderror
        <button type="submit" class="py-2.5 px-5 hover:bg-[#1C315E] rounded-lg border-2 border-[#1C315E] text-[#1C315E] font-semibold hover:text-[#C0EEE4] transition duration-200">Submit</button>
      </form>
    </div>
  </x-slot>
</x-app-layout>