<?php

namespace DiogoGPinto\AuthUIEnhancer\Concerns;

trait FormPosition
{
    public string $formPosition = 'right';

    public function formPosition(string $position = 'right'): self
    {
        if (! in_array($position, ['left', 'right'])) {
            throw new \InvalidArgumentException("Form position must be 'left' or 'right'.");
        }

        $this->formPosition = $position;

        return $this;
    }

    public function getFormPosition(): string
    {
        return $this->formPosition;
    }
}
