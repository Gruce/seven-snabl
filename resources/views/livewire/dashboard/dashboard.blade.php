<div>
    <x-card>
        <div class="flex flex-row ">
            <div class="basis-1/3 ml-3">
                <x-card>
                    <div class="flex flex-col py-1 text-center">
                        <span class="text-slate-400 text-lg">النسب</span>
                        <span class="text-slate-500">5656</span>
                    </div>
                </x-card>
            </div>
            <div class="basis-1/3 ml-3">
                <x-card>
                    <div class="flex flex-col py-1 text-center">
                        <span class="text-slate-400 text-lg">النسب</span>
                        <span class="text-slate-500">5656</span>
                    </div>
                </x-card>
            </div>
            <div class="basis-1/3">
                <x-card>
                    <div class="flex flex-col py-1 text-center">
                        <span class="text-slate-400 text-lg">النسب</span>
                        <span class="text-slate-500">5656</span>
                    </div>
                </x-card>
            </div>
        </div>
        <div class="mt-10">
            <h1>
                اخر الاشخاص المستفيدين من الهبات
            </h1>
        </div>
        <div class="relative overflow-x-auto  sm:rounded-lg mt-10" dir="rtl">
            <table class="w-full text-sm text-right text-gray-500 ">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                    <tr class="text-center">
                        <th scope="col" class="px-6 py-3">
                            #
                        </th>
                        <th scope="col" class="px-6 py-3">
                            اسم المستفيد
                        </th>
                        <th scope="col" class="px-6 py-3">
                            نوع الهبة
                        </th>
                        <th scope="col" class="px-6 py-3">
                            المنطقة
                        </th>
                        <th scope="col" class="px-6 py-3">
                                رقم الهاتف
                        </th>
                    </tr>
                </thead>
                <tbody>

                    {{-- @forelse ($cities as $city) --}}
                        <tr class="bg-white  text-center">
                            <td class="px-6 py-4">
                                {{-- {{ $loop->index + 1 }} --}}
                            </td>
                            <td class="px-6 py-4">

                                <div x-data="{ open: false }">
                                    {{-- <button  x-show="!open" @click="open = true">{{$city->name}} </button> --}}

                                    <ul x-show="open" @click.away="open = false">
                                        {{-- <x-input class="w-64" wire:model.lazy="input.cities.{{$loop->index}}.name" type="text"/> --}}
                                    </ul>
                                </div>
                            </td>
                            <td class="px-6 py-4">

                                <div x-data="{ open: false }">
                                    {{-- <button  x-show="!open" @click="open = true">{{$city->code}} </button> --}}

                                    <ul x-show="open" @click.away="open = false">
                                        {{-- <x-input class="w-64" wire:model.lazy="input.cities.{{$loop->index}}.code" type="text"/> --}}
                                    </ul>
                                </div>
                            </td>
                            <td class="px-6 py-4 ">
                                {{-- <x-button wire:click="confirm({{$city->id}},'delete')" class="text-red" icon="trash" negative /> --}}
                            </td>
                        </tr>
                    {{-- @empty

                        <td colspan="4" class="text-center">لايوجد</td>
                    @endforelse --}}
                </tbody>
            </table>
        </div>
    </x-card>
</div>
