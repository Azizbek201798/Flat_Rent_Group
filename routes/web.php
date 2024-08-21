<?php

declare(strict_types=1);

use App\Router;

Router::get('/', fn()=> loadController('home'));
Router::get('/ads/{id}', function (int $id) {
    loadController('showAd', ['id'=>$id]);
});

Router::get('/ads/create', fn()=> loadController('create-ad'));
Router::post('/ads/create', fn()=> loadController('createAd'));

Router::get('/status/create', fn()=> loadView('dashboard/create_status'));
Router::post('/status/create', fn()=> (new \App\Status())->createStatus($_POST['status']) && loadController('home'));

Router::get('/branch/create', fn()=> loadView('dashboard/create_branch'));
Router::post('/branch/create', fn()=> (new \App\Branch())->createBranch($_POST['title'],$_POST['address']) && loadController('home'));

Router::get('/branches', fn()=> loadController('home'));

Router::errorResponse(404, 'Not Found');