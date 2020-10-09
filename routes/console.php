<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Redis;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');

Artisan::command('bignews', function () {
    broadcast(new \App\Events\PublicMessageEvent(date('Y-m-d h:i:s A').": BIG NEWS!"));
    $this->comment("news sent");
})->describe('Send news');


Artisan::command('set', function () {
    Redis::command('set', ['key', 'value']);
    $this->comment("set ok");
})->describe('Send news');

Artisan::command('get', function () {
    $val = Redis::command('get', ['key']);
    $this->comment("get ok:".$val);
})->describe('Send news');