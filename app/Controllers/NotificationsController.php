<?php

namespace App\Controllers;
use Hleb\Constructor\Handlers\Request;
use App\Models\NotificationsModel;
use Base;

class NotificationsController extends \MainController
{
    // Страница уведомлений участника
    public function index()
    {
        
        // Данные участника и список уведомлений
        $account = Request::getSession('account');
        $list = NotificationsModel::listNotification($account['user_id']);
        
        $uid  = Base::getUid();
        $data = [
            'title'       => 'Уведомления',
            'description' => 'Страница уведомления',
            'list'        => $list,
        ];

        return view("notification/index", ['data' => $data, 'uid' => $uid]);
    }
   
}
