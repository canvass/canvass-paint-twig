<?php

namespace CanvassPaint\Twig;

use Twig\Environment;

class RenderFunction implements \CanvassPaint\Contract\RenderFunction
{
    /** @var \Twig\Environment */
    private $twig;

    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    public function render($data)
    {
        return $this->twig->render(
            '/form/form.twig',
            $data
        );
    }

    public function getTwigEnvironment(): Environment
    {
        return $this->twig;
    }
}
