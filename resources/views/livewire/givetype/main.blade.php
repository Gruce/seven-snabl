@section('title', 'الهبات ')

<div>
    {{-- <div class="mt-1" x-data="{ activeTab: 'first' }" x-init="activeTab = window.location.hash ? window.location.hash.replace('#', '') : 'first'"> --}}
        <div x-data="{ activeTab: 'first' }" x-init="activeTab = window.location.hash ? window.location.hash.replace('#', '') : 'first'">
            <x-ui.card class="border bg-slate-50">
                <nav class="mb-1">
                    <ul class="flex">
                        <li class="ml-1 grow">
                            <button x-show="activeTab === 'first'" @click="activeTab = 'first'" class="w-full rounded bg-blue-400 text-gray-800 p-1" slate outline href="#first" icon="user">الهبات</button>
                            <button x-show="activeTab != 'first'" @click="activeTab = 'first'" class="w-full rounded border border-blue-400 text-gray-800 p-1" href="#first" icon="user">الهبات</button>
                        </li>
                        <li class="ml-1 grow">
                            <button x-show="activeTab === 'second'" @click="activeTab = 'second'" class="w-full rounded bg-blue-400 text-gray-800 p-1" slate outline href="#second" icon="location-marker">انواع الهبات</button>
                            <button x-show="activeTab != 'second'" @click="activeTab = 'second'" class="w-full rounded border border-blue-400 text-gray-800 p-1" href="#second" icon="location-marker">انواع الهبات</button>
                        </li>
                    </ul>
                </nav>
            </x-ui.card>
            <br>
            <div x-show="activeTab === 'first'">
                <livewire:give.show key={{now()}} />
            </div>

            <div x-show="activeTab === 'second'">
                <x-ui.card>
                        <button class="block  w-full md:w-auto text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button" data-modal-toggle="givetype-modal">
                            اضافة
                        </button>
                    <div class="grid lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-1 mt-4">
                        @forelse ($gives as $give)
                        <div class="m-3">
                            <x-ui.card class="border bg-white" key="{{now()}}" shadow=false>
                                <!-- Card Content -->
                                <div class="flex flex-col">
                                    <div class="flex justify-end">
                                        <div class="flex  text-xs">
                                            <button wire:click="confirmed({{$give->id}},'delete')" type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-3 py-0.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-1 gap-1 my-1 text-center">
                                        <div class="flex items-center flex-col py-1 text-sm border border-gray-200 rounded">
                                            <span class="text-slate-400 text-sm mb-2">نوع الهبة</span>
                                            <div x-data="{ open: false }">
                                                <button class="font-semibold " x-show="!open" @click="open = true">{{$give->name}} </button>
                                                <ul x-show="open" @click.away="open = false">

                                                    <input class="w-64 rounded-lg" wire:model.lazy="input.give_types.{{$loop->index}}.name" type="text" />
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </x-ui.card>
                        </div>
                        @empty
                        <div class="col-span-2 mt-4 ">
                            <h1 class="text-center">لايوجد</h1>
                        </div>
                        @endforelse
                    </div>
                </x-ui.card>
            </div>
        </div>
        <div wire:ignore id="givetype-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center">
            <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <div class="flex justify-between items-center p-5 rounded-t border-b dark:border-gray-600">
                        <div>
                            <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                                اضافة
                            </h3>
                        </div>
                        <div>
                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="givetype-modal">
                            <i class="fa-solid fa-xmark text-lg"></i>
                            </button>
                        </div>
                    </div>

                    <div class="p-6 space-y-6">
                        <livewire:givetype.add key={{now()}}/>
                    </div>
                </div>
            </div>
        </div>
    </div>
