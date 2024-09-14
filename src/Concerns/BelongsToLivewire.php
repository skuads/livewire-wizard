<?php

namespace Skuads\LivewireWizard\Concerns;

use Skuads\LivewireWizard\Contracts\WizardForm;

trait BelongsToLivewire
{
    protected WizardForm $livewire;

    public function setLivewire(WizardForm $livewire): static
    {
        $this->livewire = $livewire;

        return $this;
    }

    public function getLivewire(): WizardForm
    {
        return $this->livewire;
    }
}
