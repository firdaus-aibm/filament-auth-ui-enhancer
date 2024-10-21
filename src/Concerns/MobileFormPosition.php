<?php

namespace DiogoGPinto\AuthUIEnhancer\Concerns;

trait MobileFormPosition
{
    public string $mobileFormPosition = 'top';

    public function mobileFormPosition(string $position = 'top'): self
    {
        if (! in_array($position, ['top', 'bottom'])) {
            throw new \InvalidArgumentException("Form position must be 'top' or 'bottom'.");
        }

        $this->mobileFormPosition = $position;

        return $this;
    }

    public function getMobileFormPosition(): string
    {
        return $this->mobileFormPosition;
    }
}
