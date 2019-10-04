<?php

namespace CanvassPaint\Twig;

use CanvassPaint\Action\RenderForm;
use Twig\Loader\ChainLoader;
use Twig\Loader\FilesystemLoader;
use Twig\TwigFunction;

final class Environment
{
    public static function extend(\Twig\Environment $environment)
    {
        $paint_loader = new FilesystemLoader(
            dirname(__DIR__, 3) . '/views'
        );

        $set_loader = $environment->getLoader();

        if (! ($set_loader instanceof ChainLoader)) {
            $set_loader = new ChainLoader([$set_loader]);
        }

        $set_loader->addLoader($paint_loader);

        $environment->setLoader($set_loader);

        $environment->addFunction(new TwigFunction(
            'canvass_form',
            static function (
                \Twig\Environment $environment,
                $form_id,
                $owner_id = null,
                array $meta_data = []
            ) {
                $render = new RenderFunction($environment);

                $build = new RenderForm($render);

                return $build->render($form_id, $owner_id, $meta_data);
            },
            ['needs_environment' => true, 'is_safe' => ['html']]
        ));
    }
}
