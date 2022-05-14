@section('title', 'الكشوفات')
<div>
    <div class="mt-3" x-data="{ open: false }">
        <x-card shadow=false>
            <x-button @click="open = ! open" primary label="اضافة" class="mb-3" />
            <div x-show="open" @click.outside="open = false" class="mb-3">
                @livewire('form.add')
            </div>


            
            @forelse ($forms as $form)
                @livewire('form.card', ['form' => $form])
            @empty
                <div>
                    <h1>لايوجد</h1>
                </div>
            @endforelse

        </x-card>
    </div>
</div>