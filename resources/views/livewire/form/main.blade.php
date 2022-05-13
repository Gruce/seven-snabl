<div>
    <div class="mt-3" x-data="{ open: false }">
        <x-button
            @click="open = ! open"
            primary
            label="+"
            class="mb-3"
        />
        <div x-show="open" @click.outside="open = false" class="mb-3">
            @livewire('form.add')
        </div>
        <x-card>
            <div class="grid lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1 gap-4 ">
                @for ($i=0 ; $i < 10 ; $i++)
                    <x-card class="shadow-none" title="التنومة">
                        <x-slot name="action">
                            <button class="rounded-full focus:outline-none focus:ring-2 focus:ring-indigo-600">
                                <x-icon name="dots-vertical" class="w-4 h-4 text-gray-500" />
                            </button>
                        </x-slot>
                        <x-slot name="footer">
                            <div class="flex justify-between items-center">
                                <x-button label="حذف" flat negative />
                                <x-button label="عرض" primary />
                            </div>
                        </x-slot>
                        <!-- Card Content -->
                        <div class="flex justify-center">
                            <div class="grid lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1 gap-4">
                                <div>
                                    <span class="text-lg">جبار علي محمد</span>
                                </div>
                                <div>
                                    <span class="text-lg">12/2/2005</span>
                                </div>
                                <div>
                                    <span class="text-lg">مستوى الفقر : B2</span>
                                </div>
                                <div>
                                    <span class="text-lg">عدد افراد الاسرة</span>
                                </div>
                            </div>
                        </div>
                    </x-card>
                @endfor
            </div>
        </x-card>
    </div>
</div>
