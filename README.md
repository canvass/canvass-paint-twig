# Canvass Paint with TwigPHP
Render Canvass forms using TwigPHP

## Installation
Install the library via composer:
```bash
composer require canvass/canvass-paint-twig
```

## Rendering a form
1. Set up your Canvass environment via `\Canvass\Forge`

0. Extend your Twig Environment: `\CanvassPaint\Twig\Environment::extend($twig)`

0. Use the Twig Function in the appropriate place in your view: `{{ canvass_form(form_id, owner_id) }}` 
