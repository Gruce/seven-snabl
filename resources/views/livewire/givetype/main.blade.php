@section('title', 'الهبات ')

<div>
    {{-- <div class="mt-1" x-data="{ activeTab: 'first' }" x-init="activeTab = window.location.hash ? window.location.hash.replace('#', '') : 'first'"> --}}
        <div x-data="{ activeTab: 'first' }" x-init="activeTab = window.location.hash ? window.location.hash.replace('#', '') : 'first'">
            <x-ui.card class="border bg-slate-50">
                <nav class="mb-1">
                    <ul class="flex">
                        <li class="ml-1 grow">
                            <button x-show="activeTab === 'first'" @click="activeTab = 'first'" class="w-full p-2 text-gray-200 bg-blue-700 border border-blue-800 rounded" slate outline href="#first" icon="user">الهبات</button>
                            <button x-show="activeTab != 'first'" @click="activeTab = 'first'" class="w-full p-2 text-gray-800 border border-blue-800 rounded" href="#first" icon="user">الهبات</button>
                        </li>
                        <li class="ml-1 grow">
                            <button x-show="activeTab === 'second'" @click="activeTab = 'second'" class="w-full p-2 text-gray-200 bg-blue-700 border border-blue-800 rounded" slate outline href="#second" icon="location-marker">انواع الهبات</button>
                            <button x-show="activeTab != 'second'" @click="activeTab = 'second'" class="w-full p-2 text-gray-800 border border-blue-800 rounded" href="#second" icon="location-marker">انواع الهبات</button>
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
                    <div class="grid mt-4 lg:grid-cols-3 md:grid-cols-3 sm:grid-cols-1">
                        @forelse ($gives as $give)
                        <div class="m-3">
                            <x-ui.card class="bg-white border" key="{{now()}}" shadow=false>
                                <!-- Card Content -->
                                <div class="flex flex-col">
                                    <div class="flex justify-end">
                                        <div class="flex text-xs">
                                            <button wire:click="confirmed({{$give->id}}, 'delete')" type="button" class="px-4 py-2 mb-2 mr-2 text-sm font-medium text-red-500 border border-red-600 rounded-lg hover:bg-red-600 hover:text-white">
                                                <span>حذف</span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-2 gap-1 my-1 text-center">
                                        <div class="flex flex-col items-center py-1 text-sm border border-gray-200 rounded">
                                            <span class="mb-2 text-sm text-slate-400">نوع الهبة</span>
                                            <div x-data="{ open: false }">
                                                <button class="font-semibold " x-show="!open" @click="open = true">{{$give->name}} </button>
                                                <ul x-show="open" @click.away="open = false">

                                                    <input class="w-48 rounded-lg" wire:model.lazy="input.give_types.{{$loop->index}}.name" type="text" />
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="flex flex-col items-center py-1 text-sm border border-gray-200 rounded">
                                            <span class="mb-2 text-sm text-slate-400">مجموع الهبات</span>
                                            <div x-data="{ open: false }">
                                                <span class="font-semibold ">{{$give->give_forms()->count()}}</span>
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
        <div wire:ignore id="givetype-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 items-center justify-center hidden w-full overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
            <div class="relative w-full h-full max-w-2xl p-4 md:h-auto">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <div class="flex items-center justify-between p-5 border-b rounded-t dark:border-gray-600">
                        <div>
                            <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                                اضافة
                            </h3>
                        </div>
                        <div>
                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="givetype-modal">
                            <i class="text-lg fa-solid fa-xmark"></i>
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
