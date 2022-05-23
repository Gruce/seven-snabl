<div>
    <div class="mt-1" x-data="{ activeTab: 'first' }" x-init="activeTab = window.location.hash ? window.location.hash.replace('#', '') : 'first'">
    <x-card>
        <nav>
            <ul class="flex">
                <li class="ml-1 grow">
                    <x-button x-show="activeTab === 'first'" @click="activeTab = 'first'" class="w-full" slate outline href="#first" icon="clipboard-list" label="الهبات" />
                    <x-button x-show="activeTab != 'first'" @click="activeTab = 'first'" class="w-full" href="#first" icon="clipboard-list" label="الهبات" />
                </li>
                <li class="ml-1 grow">
                    <x-button x-show="activeTab === 'second'" @click="activeTab = 'second'" class="w-full" slate outline href="#second" icon="database" label="انواع الهبات" />
                    <x-button x-show="activeTab != 'second'" @click="activeTab = 'second'" class="w-full" href="#second" icon="database" label="انواع الهبات" />
                </li>
            </ul>
        </nav>
    </x-card>
    <br>
    <div x-show="activeTab === 'first'">
        @livewire('give.show')
    </div>
    <div x-show="activeTab === 'second'">
        <x-card>
            @livewire('givetype.add')
            {{-- <div class="relative overflow-x-auto  sm:rounded-lg mt-10" dir="rtl">
                <table class="w-full text-sm text-right text-gray-500 ">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                        <tr class="text-center">
                            <th scope="col" class="px-6 py-3">
                                #
                            </th>
                            <th scope="col" class="px-6 py-3">
                                الهبة
                            </th>
                            <th scope="col" class="px-6 py-3">
                                الاجراءات
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($gives as $give)
                            <tr class="bg-white text-center">
                                <td class="px-6 py-4">
                                    {{ $loop->index + 1 }}
                                    <td class="px-6 py-4">

                                        <div x-data="{ open: false }">
                                            <button  x-show="!open" @click="open = true">{{$give->name}} </button>

                                            <ul x-show="open" @click.away="open = false">
                                                <x-input class="w-64" wire:model.lazy="input.give_types.{{$loop->index}}.name" type="text"/>
                                            </ul>
                                        </div>
                                    </td>
                                <td class="px-6 py-4 text-center">
                                    <x-button wire:click="confirm({{ $give->id }},'delete')" class="text-red"
                                        icon="trash" negative />
                                </td>
                            </tr>
                        @empty

                            <td colspan="3" class="text-center">لايوجد</td>
                        @endforelse
                    </tbody>
                </table>
            </div> --}}

        </x-card>
    </div>
</div>
</div>
