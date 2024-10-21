<?php

namespace DiogoGPinto\AuthUIEnhancer\Concerns;

trait BackgroundAppearance
{
    public ?string $formPanelBackgroundColor = null;

    public ?string $emptyPanelBackgroundColor = null;

    public ?string $emptyPanelBackgroundImage = null;

    public ?string $emptyPanelBackgroundImageOpacity = '100%';

    public function formPanelBackgroundColor(string | array $color, int $shade = 500): self
    {
        $this->formPanelBackgroundColor = $color[$shade];

        return $this;
    }

    public function getFormPanelBackgroundColor(): ?string
    {
        return $this->formPanelBackgroundColor ? 'rgb(' . $this->formPanelBackgroundColor . ')' : 'transparent';
    }

    public function emptyPanelBackgroundColor(array $color, int $shade = 500): self
    {
        $this->emptyPanelBackgroundColor = $color[$shade];

        return $this;
    }

    public function getEmptyPanelBackgroundColor(): ?string
    {
        return $this->emptyPanelBackgroundColor ? 'rgb(' . $this->emptyPanelBackgroundColor . ')' : 'rgb(var(--primary-500))';
    }

    public function emptyPanelBackgroundImage(?string $url): self
    {
        $this->emptyPanelBackgroundImage = $url;

        return $this;
    }

    public function getEmptyPanelBackgroundImage(): ?string
    {
        return $this->emptyPanelBackgroundImage;
    }

    public function emptyPanelBackgroundImageOpacity(?string $opacity): self
    {
        $this->emptyPanelBackgroundImageOpacity = $opacity;

        return $this;
    }

    public function getEmptyPanelBackgroundImageOpacity(): ?string
    {
        return $this->emptyPanelBackgroundImageOpacity;
    }
}
