<?php
$this->router->add('login', '/admin/login', 'LoginController:form');
$this->router->add('auth-admin', '/admin/auth', 'LoginController:authAdmin', 'POST');
$this->router->add('dashboard', '/admin/', 'DashboardController:index');
$this->router->add('logout', '/admin/logout', 'AdminController:logout');

//Pages (GET)
$this->router->add('pages', '/admin/pages', 'PageController:listing');
$this->router->add('page-create', '/admin/pages/create', 'PageController:create');
$this->router->add('page-edit', '/admin/pages/edit/(id:int)', 'PageController:edit');
//Pages (POST)
$this->router->add('page-add', '/admin/pages/add', 'PageController:add', 'POST');
$this->router->add('page-update', '/admin/pages/update', 'PageController:update', 'POST');