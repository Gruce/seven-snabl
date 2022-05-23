<div>
    {{-- <div class="mt-1" x-data="{ activeTab: 'first' }" x-init="activeTab = window.location.hash ? window.location.hash.replace('#', '') : 'first'"> --}}
    <div x-data="{ activeTab: 'first' }" x-init="activeTab = window.location.hash ? window.location.hash.replace('#', '') : 'first'">
        <x-card>
                <nav class="mb-1">
                    <ul class="flex">
                        <li class="ml-1 grow">
                            <x-button x-show="activeTab === 'first'" @click="activeTab = 'first'" class="w-full" slate outline href="#first" icon="user" label="الهبات" />
                            <x-button x-show="activeTab != 'first'" @click="activeTab = 'first'" class="w-full" href="#first" icon="user" label="الهبات" />
                        </li>
                        <li class="ml-1 grow">
                            <x-button x-show="activeTab === 'second'" @click="activeTab = 'second'" class="w-full" slate outline href="#second" icon="location-marker" label="انواع الهبات" />
                            <x-button x-show="activeTab != 'second'" @click="activeTab = 'second'" class="w-full" href="#second" icon="location-marker" label="انواع الهبات" />
                        </li>
                    </ul>
                </nav>
        </x-card>
        <br>
        <div x-show="activeTab === 'first'">
            <livewire:give.show key={{now()}}/>
        </div>

        <div x-show="activeTab === 'second'">
            <x-card>
                <livewire:givetype.add key={{now()}}/>
                <div class="grid lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-1 mt-4">
                    @forelse ($gives as $give)
                    <div class="m-3">
                        <x-card key="{{now()}}" shadow=false >
                            <x-slot name="footer">
                                <div class="flex justify-center text-xs">
                                    <div class="flex flex-col items-center justify-center gap-1">
                                        <x-button wire:click="confirm({{ $give->id }},'delete')" class="text-red" icon="trash" negative />
                                    </div>
                                </div>
                            </x-slot>
                            <!-- Card Content -->
                            <div class="flex flex-col">
                                <div class="grid grid-cols-1 gap-1 my-1 text-center">
                                    <div class="flex items-center flex-col py-1 text-sm border border-gray-200 rounded">
                                        <span class="text-slate-400 text-sm mb-2">نوع الهبة</span>
                                        <div x-data="{ open: false }">
                                            <button  x-show="!open" @click="open = true">{{$give->name}} </button>
                                            <ul x-show="open" @click.away="open = false">
                                                <x-input class="w-64" wire:model.lazy="input.give_types.{{$loop->index}}.name" type="text"/>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </x-card>
                    </div>
                    @empty
                        <td colspan="3" class="text-center">لايوجد</td>
                    @endforelse
                </div>
            </x-card>
        </div>
    </div>
</div>
