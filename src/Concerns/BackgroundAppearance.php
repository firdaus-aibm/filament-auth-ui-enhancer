<?php

namespace DiogoGPinto\AuthUIEnhancer\Concerns;

trait BackgroundAppearance
{
    public string $loginPanelBackgroundColor = 'bg-transparent';

    public string $emptyPanelBackgroundColor = 'bg-primary-500';

    public ?string $emptyPanelBackgroundImage = null;

    public ?string $emptyPanelBackgroundImageOpacity = '100%';

    public function loginPanelBackgroundColor(string $color): self
    {
        $this->loginPanelBackgroundColor = $color;

        return $this;
    }

    public function getLoginPanelBackgroundColor(): string
    {
        return $this->loginPanelBackgroundColor;
    }

    public function emptyPanelBackgroundColor(string $color): self
    {
        $this->emptyPanelBackgroundColor = $color;

        return $this;
    }

    public function getEmptyPanelBackgroundColor(): string
    {
        return $this->emptyPanelBackgroundColor;
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
