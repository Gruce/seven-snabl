@section('title', 'الهبات ')

<div>
    {{-- <div class="mt-1" x-data="{ activeTab: 'first' }" x-init="activeTab = window.location.hash ? window.location.hash.replace('#', '') : 'first'"> --}}
    <div x-data="{ activeTab: 'first' }" x-init="activeTab = window.location.hash ? window.location.hash.replace('#', '') : 'first'">
        <x-ui.card class="border bg-slate-50">
                <nav class="mb-1">
                    <ul class="flex">
                        <li class="ml-1 grow">
                            <button x-show="activeTab === 'first'" @click="activeTab = 'first'"
                                class="w-full rounded bg-blue-400 text-gray-800 p-1" slate outline href="#first"
                                icon="user">الهبات</button>
                            <button x-show="activeTab != 'first'" @click="activeTab = 'first'"
                                class="w-full rounded bg-blue-300 text-gray-100 p-1" href="#first"
                                icon="user">الهبات</button>
                        </li>
                        <li class="ml-1 grow">
                            <button x-show="activeTab === 'second'" @click="activeTab = 'second'"
                                class="w-full rounded bg-blue-400 text-gray-800 p-1" slate outline href="#second"
                                icon="location-marker">انواع الهبات</button>
                            <button x-show="activeTab != 'second'" @click="activeTab = 'second'"
                                class="w-full rounded bg-blue-300 text-gray-100 p-1" href="#second"
                                icon="location-marker">انواع الهبات</button>
                        </li>
                    </ul>
                </nav>
        </x-ui.card>
        <br>
        <div x-show="activeTab === 'first'">
            <livewire:give.show key={{now()}}/>
        </div>

        <div x-show="activeTab === 'second'">
            <x-ui.card >
                <livewire:givetype.add key={{now()}}/>
                <div class="grid lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-1 mt-4">
                    @forelse ($gives as $give)
                    <div class="m-3">
                        <x-ui.card class="border bg-white" key="{{now()}}" shadow=false >
                            <!-- Card Content -->
                            <div class="flex flex-col">
                                <div class="grid grid-cols-1 gap-1 my-1 text-center">
                                    <div class="flex items-center flex-col py-1 text-sm border border-gray-200 rounded">
                                        <span class="text-slate-400 text-sm mb-2">نوع الهبة</span>
                                        <div x-data="{ open: false }">
                                            <button class="font-semibold " x-show="!open" @click="open = true">{{$give->name}} </button>
                                            <ul x-show="open" @click.away="open = false">

                                                <input class="w-64 rounded-lg" wire:model.lazy="input.give_types.{{$loop->index}}.name" type="text"/>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-2">
                                <div class="flex justify-center text-xs">
                                    <div class="flex flex-col items-center justify-center gap-1 ">
                                        <button  wire:click="confirm({{$give->id}},'delete')"  type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-1.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"><i class="fa-solid fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </x-ui.card>
                    </div>
                    @empty
                        <td colspan="3" class="text-center">لايوجد</td>
                    @endforelse
                </div>
            </x-ui.card>
        </div>
    </div>
</div>
