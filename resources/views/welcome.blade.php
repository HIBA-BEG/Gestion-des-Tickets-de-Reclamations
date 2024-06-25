<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('layouts.head')

<body class="bg-[#F7F5F4]">
    @include('layouts.navbar')

<div class="mx-auto max-w-7xl py-24 sm:px-6 sm:py-32 lg:px-8">
  <div class="isolate overflow-hidden px-6 pt-16 sm:px-16 md:pt-24 lg:flex lg:gap-x-20 lg:px-24 lg:pt-0">
    <div class="mx-auto text-center lg:mx-0 lg:flex-auto lg:py-32">
      <h2 class="font-bold tracking-tight text-black sm:text-4xl text-3xl">
        <span class="lg:text-5xl text-4xl">SIMPLIFIEZ</span> vos demandes,<br />
        améliorez votre <span class="lg:text-5xl text-4xl">SERVICE.</span>
      </h2>
      <div class="mt-10 flex items-center justify-center">
        <a href="{{ route('guest_ticket.create')}} ">
          <button class="mt-2 rounded-full bg-[#253743] px-4 py-2 font-semibold text-white hover:bg-[#3e5f77] md:ml-4 md:mt-0">Besoin d'aide ?</button>
        </a>
      </div>
    </div>
    <div class="flex justify-center items-center lg:items-start">
      <img class="mt-16 lg:mt-8 lg:h-80" src="{{ asset('img/reclamation.jpg') }}" alt="reclamation pic" />
    </div>
  </div>
</div>
</body>

</html>