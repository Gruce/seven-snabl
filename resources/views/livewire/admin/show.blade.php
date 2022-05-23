<div>
    <div class="relative overflow-x-auto  sm:rounded-lg mt-10">
        {{-- <table class="w-full text-sm text-right text-gray-500 table-fixed">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                <tr class="text-center">
                    <th scope="col" class="px-6 py-3">
                        #
                    </th>
                    <th scope="col" class="px-6 py-3">
                        اسم المستخدم
                    </th>
                    <th scope="col" class="px-6 py-3">
                        البريد الالكتروني
                    </th>
                    <th scope="col" class="px-6 py-3">
                        نوع المستخدم
                    </th>
                    <th scope="col" class="px-6 py-3">
                        رقم الهاتف
                    </th>
                    <th scope="col" class="px-6 py-3">
                        الاجراءات
                    </th>
                </tr>
            </thead>
            <tbody> --}}
                <div class="grid lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-1">
                    @forelse ($user as $item)
                    <div key="{{now()}}" class="m-3">
                        <x-card shadow=false :title="'#'. ($loop->index + 1). ' ' .$item->name">
                            <x-slot name="footer">
                                <div class="flex justify-center text-xs">
                                    <div class="flex flex-col items-center justify-center gap-1">
                                        <x-button wire:click="confirm({{$item->id}},'delete')" class="text-red" icon="trash" negative />
                                    </div>
                                </div>
                            </x-slot>
                            <!-- Card Content -->
                            <div class="flex flex-col">
                                {{-- CONTENT TAB --}}
                                <div>
                                    <div class="grid lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-1 gap-1 my-1 text-center">
                                        <div class="flex flex-col py-1 text-sm border border-gray-200 rounded">
                                            <span class="text-slate-400 text-sm mb-2">اسم المستخدم</span>
                                            <div x-data="{ open: false }" class="flex justify-center">
                                                <button  x-show="!open" @click="open = true">{{$item->name}} </button>
                                                <ul x-show="open" @click.away="open = false">
                                                    <x-input class="w-64" wire:model.lazy="input.user.{{$loop->index}}.name" type="text"/>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="flex flex-col py-1 text-sm border border-gray-200 rounded">
                                            <span class="text-slate-400 text-sm mb-2">البريد الالكتروني</span>
                                            <div x-data="{ open: false }" class="flex justify-center">
                                                <button  x-show="!open" @click="open = true">{{$item->email}} </button>
                                                <ul x-show="open" @click.away="open = false">
                                                    <x-input class="w-64" wire:model.lazy="input.user.{{$loop->index}}.email" type="text"/>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="flex flex-col py-1 text-sm border border-gray-200 rounded">
                                            <span class="text-slate-400 text-sm mb-2">نوع المستخدم</span>
                                            <div x-data="{ open: false }" class="flex justify-center">
                                                <button  x-show="!open" @click="open = true">{{$item->is_admin == 1 ? 'مشرف' : 'مخول'}} </button>
                                                <ul x-show="open" @click.away="open = false">
                                                    <x-select
                                                    :options="[
                                                            ['name'=> 'مشرف','id'=> 1 ],
                                                            ['name'=> 'مخول', 'id'=> 2 ],
                                                    ]"
                                                    wire:model.lazy="input.user.{{$loop->index}}.is_admin"
                                                    option-label="name"
                                                    option-value="id"
                                                />
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="flex flex-col py-1 text-sm border border-gray-200 rounded">
                                            <span class="text-slate-400 text-sm mb-2">رقم الهاتف</span>
                                            <div x-data="{ open: false }" class="flex justify-center">
                                                <button  x-show="!open" @click="open = true">{{$item->phonenumber}} </button>
                                                <ul x-show="open" @click.away="open = false">
                                                    <x-input class="w-64" wire:model.lazy="input.user.{{$loop->index}}.phonenumber" type="text"/>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- END : CONTENT TAB --}}
                            </div>
                        </x-card>
                    </div>
                    @empty
                </div>
                    <h2 class="text-center">لايوجد</h2>
                    {{-- <td colspan="4" class="text-center">لايوجد</td> --}}
                @endforelse
            </tbody>
        </table>
    </div>
</div>

