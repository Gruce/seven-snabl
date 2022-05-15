<div>
    <x-card>
        <div class="relative overflow-x-auto  sm:rounded-lg mt-10" dir="rtl">
            <table class="w-full text-sm text-right text-gray-500 ">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                    <tr class="text-center">
                        <th scope="col" class="px-6 py-3">
                            #
                        </th>
                        <th scope="col" class="px-6 py-3">
                            المتلقي
                        </th>
                        <th scope="col" class="px-6 py-3">
                            نوع الهبة
                        </th>
                        <th scope="col" class="px-6 py-3">
                            الملاحظات
                        </th>
                        <th scope="col" class="px-6 py-3">
                            الاجراءات
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($gives as $give)
                        <tr class="bg-white  text-center">
                            <td class="px-6 py-4">
                                {{ $loop->index + 1 }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $give->form->head_family->name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $give->give_type->name}}
                            </td>
                            <td class="px-6 py-4">
                                {{ $give->note }}
                            </td>
                            <td class="px-6 py-4 ">
                                <x-button class="text-gray-500" icon="pencil-alt" secondary />
                                <x-button wire:click="confirm({{ $give->id }},'delete')" class="text-red"
                                    icon="trash" negative />
                            </td>
                        </tr>
                    @empty

                        <td colspan="4" class="text-center">لايوجد</td>
                    @endforelse
                </tbody>
            </table>
        </div>

    </x-card>
</div>
