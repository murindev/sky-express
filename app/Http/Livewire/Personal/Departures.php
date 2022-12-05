<?php

namespace App\Http\Livewire\Personal;

use App\Services\Courier\Courier;
use Livewire\Component;

class Departures extends Component
{

    public $perPage = 10;
    public $currentPage = 1;

    private $sample = [
        "@attributes" => [
            "orderno" => "91#18",
            "awb" => "91#18",
            "orderno2" => "",
            "ordercode" => "7095",
            "givencode" => "",
        ],
        "barcode" => "91#18",
        "sender" => [
            "company" => "ЭЙБИЭС",
            "person" => "Олеся",
            "town" => "Москва город",
            "address" => "Талалихина ул., д.41 стр.26",
            "phone" => "8-495-566-29-785",
            "contacts" => [],
            "date" => [],
            "time_min" => [],
            "time_max" => [],
        ],
        "receiver" => [
            "company" => "Молокозавод",
            "person" => [],
            "phone" => "+79999990101",
            "contacts" => [],
            "inn" => [],
            "zipcode" => "127083",
            "town" => "Москва город",
            "address" => "улица В.Масловка, 6, кв 2",
            "date" => "2022-11-27",
            "time_min" => [],
            "time_max" => [],
            "coords" => [],
            "deliveryPIN" => [],
        ],
        "price" => "0.00",
        "inshprice" => "0.00",
        "paytype" => "NO",
        "weight" => "2",
        "quantity" => "1",
        "service" => "2",
        "type" => "1",
        "return" => "NO",
        "return_service" => "1",
        "return_type" => "1",
        "return_weight" => [],
        "return_message" => [],
        "pickup" => "NO",
        "print_check" => "NO",
        "waittime" => "0",
        "enclosure" => [],
        "instruction" => [],
        "basestatus" => [],
        "currcoords" => [],
        "courier" => [],
        "deliveryprice" => [],
        "receiverpays" => "NO",
        "acceptpartially" => "YES",
        "status" => "NEW",
        "statushistory" => [],
        "customstatecode" => "1",
        "clientstatecode" => [],
        "deliveredto" => [],
        "delivereddate" => [],
        "deliveredtime" => [],
        "department" => [],
        "costcode" => [],
        "outstrbarcode" => [],
        "respstore" => "1",
        "partner" => "Офис в Москве",
        "arrival" => [],
        "receipt" => [],
        "items" => [],
        "packages" => [],
    ];

    public $orders = [];
    public $ordersCount;

    protected $listeners = [
        'onChangeCurrentPage' => 'onChangeCurrentPage',
        'onDeleteOrder' => 'onDeleteOrder',
    ];


    public function onChangeCurrentPage($page)
    {
        $this->currentPage = $page;

    }

    public function onDeleteOrder($orderNr)
    {
//        dump($orderNr);
        $order = Courier::delete(['orderno' => $orderNr]);
        $this->preMount();
    }


    public function preMount() {
        $orders = Courier::statuses();
        $this->ordersCount = $orders['@attributes']['count'];
        $this->orders = $orders['order'];
    }


    public function mount()
    {
        $this->preMount();
    }


    public function render()
    {
        return view('livewire.personal.departures');
    }
}
