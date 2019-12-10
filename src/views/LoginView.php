<?php

class LoginView extends BaseView
{
    public function __construct()
    {
        parent::__construct();
        $this->appendBody(
            h('div.container', 
                h('div.row',
                    h('div.baseContainer.col-8.offset-2',
                        h('h2', 'Login'),
                        h('form.form-horizontal', ['action' => '/user/login', 'method' => 'POST'],
                            h('div.form-group.row', 
                                h('label.col-sm-2.col-form-label.col-form-label-sm', ['for' => 'username'], 'Username'),
                                h('div.col-sm-10',
                                    h('input.form-control.form-control-sm', ['name' => 'username', 'type' => 'text', 'id' => 'username', 'palceholder' => 'Username'])
                                )
                            ),
                            h('div.form-group.row', 
                                h('label.col-sm-2.col-form-label.col-form-label-sm', ['for' => 'password'], 'Password'),
                                h('div.col-sm-10',
                                    h('input.form-control.form-control-sm', ['name' => 'password', 'type' => 'password', 'id' => 'password', 'palceholder' => 'Password'])
                                )
                            ),
                            h('button.btn.btn-primary', ['type' => 'submit'], 'Login'), h('span', ['style' => 'color: red'], $_GET['error'] ?? '')
                        ),
                        '<br>'
                    )
                )
            )
        );
    }
}