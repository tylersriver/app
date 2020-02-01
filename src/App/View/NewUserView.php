<?php

namespace Sample\App\View;

use Sample\App\View\BaseView;

class NewUserView extends BaseView
{
    public function __construct()
    {
        parent::__construct();
        $this->appendBody(
            h('div.container', 
                h('div.row',
                    h('div.baseContainer.col-8.offset-2',

                        // Title
                        h('h2', 'New User'),

                        // Create Form
                        h('form.form-horizontal', ['action' => 'user/create', 'method' => 'POST'],
                            
                            // First Name
                            h('div.form-group.row', 
                                h('label.col-sm-2.col-form-label.col-form-label-sm', ['for' => 'firstname'], 'First Name'),
                                h('div.col-sm-10',
                                    h('input.form-control.form-control-sm', [
                                        'name' => 'firstname', 
                                        'type' => 'text', 
                                        'id' => 'firstname', 
                                        'palceholder' => 'John'
                                    ])
                                )
                            ),   

                            // Last Name
                            h('div.form-group.row', 
                                h('label.col-sm-2.col-form-label.col-form-label-sm', ['for' => 'lastname'], 'Last Name'),
                                h('div.col-sm-10',
                                    h('input.form-control.form-control-sm', [
                                        'name' => 'lastname', 
                                        'type' => 'text', 
                                        'id' => 'lastname', 
                                        'palceholder' => 'Doe'
                                    ])
                                )
                            ),   

                            // Email
                            h('div.form-group.row', 
                                h('label.col-sm-2.col-form-label.col-form-label-sm', ['for' => 'email'], 'Email'),
                                h('div.col-sm-10',
                                    h('input.form-control.form-control-sm', [
                                        'name' => 'email', 
                                        'type' => 'text', 
                                        'id' => 'email', 
                                        'palceholder' => 'example@example.com'
                                    ])
                                )
                            ),

                            // User Name
                            h('div.form-group.row', 
                                h('label.col-sm-2.col-form-label.col-form-label-sm', ['for' => 'username'], 'Username'),
                                h('div.col-sm-10',
                                    h('input.form-control.form-control-sm', [
                                        'name' => 'username', 
                                        'type' => 'text', 
                                        'id' => 'username', 
                                        'palceholder' => 'Username'
                                    ])
                                )
                            ),

                            // Password
                            h('div.form-group.row', 
                                h('label.col-sm-2.col-form-label.col-form-label-sm', ['for' => 'password'], 'Password'),
                                h('div.col-sm-10',
                                    h('input.form-control.form-control-sm', [
                                        'name' => 'password', 
                                        'type' => 'password', 
                                        'id' => 'password', 
                                        'palceholder' => 'Password'
                                    ])
                                )
                            ),

                            // Re-enter Password
                            h('div.form-group.row', 
                                h('label.col-sm-2.col-form-label.col-form-label-sm', ['for' => 'password'], 'Re-Enter Password'),
                                h('div.col-sm-10',
                                    h('input.form-control.form-control-sm', [
                                        'name' => 'reenterpassword', 
                                        'type' => 'password', 
                                        'id' => 'reenterpassword', 
                                        'palceholder' => 'Password'
                                    ])
                                )
                            ),
                                
                            // Submit Button
                            h('button.btn.btn-primary', ['type' => 'submit'], 'Create'), 
                            h('span', ['style' => 'color: red'], $_GET['error'] ?? '')
                        ),
                        '<br>'
                    )
                )
            )
        );
    }
}