<div>
    <x-light-button wire:click.prevent="PostEncounterSatuSehat()" type="button" wire:loading.remove>
        Kirim Satu Sehat
    </x-light-button>
    <div wire:loading wire:target="PostEncounterSatuSehat">
        <x-loading />
    </div>
</div>