<div>
    <div class="mt-3" x-data="{ open: false }">
        <x-card>
            <x-button
                @click="open = ! open"
                primary
                label="اضافة"
                class="mb-3"
            />
            <div x-show="open" @click.outside="open = false" class="mb-3">
                @livewire('form.add')
            </div>
            @livewire('form.card')
        </x-card>
    </div>
</div>
