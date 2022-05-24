<x-guest-layout dir="rtl">

    <x-jet-authentication-card>

        <x-slot name="logo">

            <img src="{{ asset('img/a.png') }}" alt="Logo" class="w-17" >

        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div dir="rtl">
                <x-jet-label  for="email" value="البريد الاكتروني" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4" dir="rtl">
                <x-jet-label for="password" value="كلمة المرور" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="flex items-center justify-center mt-4">
                {{-- @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        هل نسيت كلمة المرور
                    </a>
                @endif --}}

                <x-jet-button class="ml-4">
                    تسجيل دخول
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
