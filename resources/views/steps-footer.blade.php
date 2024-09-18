<div class="p-2 flex flex-row-reverse justify-between">
    @if($this->hasNextStep())
    <button wire:click="goToNextStep" spinner="goToNextStep">
        {{ __('Next') }} &raquo;
    </button>
    @else
    <button type="submit">
        {{ __('Submit') }}
    </button>
    @endif
    @if($this->hasPrevStep())
    <button wire:click="goToPrevStep" spinner="goToPrevStep">
        &laquo; {{ __('Back') }}
    </button>
    @endif
</div>