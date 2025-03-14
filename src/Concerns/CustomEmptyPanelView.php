<?php

namespace DiogoGPinto\AuthUIEnhancer\Concerns;

trait CustomEmptyPanelView
{
    public ?string $customEmptyPanelView = null;

    public function customEmptyPanelView(string $view): self
    {
        $this->customEmptyPanelView = $view;

        return $this;
    }

    public function getCustomEmptyPanelView(): ?string
    {
        return $this->customEmptyPanelView;
    }
}