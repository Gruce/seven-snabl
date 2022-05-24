<div>
    <x-ui.card class="border bg-white" >
        <div class="relative sm:rounded-lg mt-10">
            <div class="grid lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-1">
                @forelse ($gives as $give)
                <div key="{{now()}}" class="m-3">
                    <x-ui.card class="border bg-gray-50">
                        <div>
                            <h3 class="font-semibold">
                                # {{$give->form->id}} {{$give->form->head_family->name}}
                            </h3>
                        </div>
                        <!-- Card Content -->
                        <div class="flex flex-col">
                            <div class="grid lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-1 gap-1 my-1 text-center">
                                <div class="flex flex-col py-1 text-sm border border-gray-200 rounded">
                                    <span class="text-slate-400 text-sm mb-2">نوع الهبة</span>
                                    <div x-data="{ open: false }" class="flex justify-center">
                                        <button class="font-semibold " x-show="!open" @click="open = true"> {{ $give->give_type->name}} </button>
                                        <ul x-show="open" @click.away="open = false">
                                            <select  wire:model.lazy="input.give_forms.{{$loop->index}}.give_type_id"
                                                class="bg-white border  border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 px-8 ">
                                            @foreach ($give_types as  $give_type)
                                            <option  value="{{$give_type['id']}}">{{$give_type['name']}}</option>
                                            @endforeach
                                            </select>
                                        </ul>
                                    </div>
                                </div>
                                <div class="flex flex-col py-1 text-sm border border-gray-200 rounded">
                                    <span class="text-slate-400 text-sm mb-2">الملاحظات</span>
                                    <div x-data="{ open: false }" class="flex justify-center">
                                        <button class="font-semibold " x-show="!open" @click="open = true"> {{ $give->note }}</button>
                                        <ul x-show="open" @click.away="open = false">
                                            <input type="text"
                                            wire:model.lazy="input.give_forms.{{$loop->index}}.note"
                                            class="bg-white border  border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <div class="flex justify-center text-xs">
                                <div class="flex flex-col items-center justify-center gap-1">
                                    <button  wire:click="confirmed({{$give->id}})"  type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-1.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"><i class="fa-solid fa-trash"></i>
                                </div>
                            </div>
                        </div>
                    </x-ui.card>
                </div>
                @empty
                <h2 class="text-center">لايوجد</h2>
                @endforelse
            </div>
        </div>

    </x-ui.card>
</div>
