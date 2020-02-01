<?php

namespace app\views;

use Ion\View\AbstractView;

use Ion\App;

/**
 * BaseView Class
 * 
 * Here is an example of using the ion frameworks
 * views. You can see you extend the Abstract View and then 
 * there are several helper functions for contsructing the view.
 * Utilize the h() function for generating nested HTML tags
 * with properties. No need to write any html, we stick to PHP here.
 */
class BaseView extends AbstractView
{
    public function __construct()
    {
        $this->appendHead(
            h('base', ['href' => App::getInstance()->getSetting('root')])
        );
        $this->styleSheets();
        $this->scripts();
        $this->setBody(
            h('nav.navbar.navbar-expand-lg.navbar-dark.bg-dark',
                h('a.navbar-brand', ['href' => 'view/home'], 'App Sample'),
                h('button.navbar-toggler', [
                    'type' => 'button',
                    'data-toggle' => 'collapse',
                    'data-target' => '#navbarSupportedContent',
                    'aria-controls' => 'navbarSupportedContent',
                    'aria-expanded' => 'false',
                    'aria-label' => 'Toggle navigation'
                ], h('span.navbar-toggler-icon')),
                h('div.collapse.navbar-collapse', ['id' => 'navbarSupportedContent'],
                    h('ul.navbar-nav.mr-auto',
                        h('li.nav-item', h('a.nav-link', ['href'=>'view/home'], 'Home', h('span.sr-only', '(current)'))),
                        h('li.nav-item.dropdown',
                            h('a.nav-link.dropdown-toggle', [
                                'href' => '#',
                                'id' => 'navbarDropdownMenuLink',
                                'role' => 'button',
                                'data-toggle' => 'dropdown',
                                'aria-haspopup' => 'true',
                                'aria-expanded' => 'false'
                            ], 'Profile') ,
                            h('div.dropdown-menu', ['aria-labelledby' => 'navbarDropdownMenuLink'],
                                h('a.dropdown-item', ['href' => 'view/login'], 'Login'),
                                h('a.dropdown-item', ['href' => 'user/logout'], 'Logout'),
                                h('a.dropdown-item', ['href' => 'view/new-user'], 'Create')
                            )
                        )
                    )
                )
            )
        );
        $this->setFooter(
            h('footer',
                h('div.footer', 'Copyright Tyler Sriver | 2019 | ',
                    h('a', ['href' => 'https://github.com/tylersriver/', 'target' => '_blank'], 'GitHub Repo')
                )
            )
        );
    }

    /**
     * JS Scripts needed on every page
     */
    private function scripts()
    {
        $this->setScripts([
            h('script', [
                'src' => 'https://code.jquery.com/jquery-3.2.1.slim.min.js',
                'integrity' => 'sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN',
                'crossorigin' => 'anonymous'
            ]),
            h('script', [
                'src' => 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js',
                'integrity' => 'sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q',
                'crossorigin' => 'anonymous'
            ]),
            h('script', [
                'src' => 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js',
                'integrity' => 'sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl',
                'crossorigin' => 'anonymous'
            ])
        ]);
    }

    /**
     * CSS Style sheets needed on every page
     */
    private function stylesheets()
    {
        $this->setStylesheets([
            h('link', [
                'rel' => 'stylesheet',
                'href' => 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css',
                'integrity' => 'sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm',
                'crossorigin' => 'anonymous'
            ]),
            h('link', [
                'rel' => 'stylesheet',
                'href' => 'web/css/global-style.css'
            ])
        ]);
    }
}