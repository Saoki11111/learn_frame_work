<?php
namespace app\controller;

require_once 'controller.php';
require_once dirname ( __FILE__ ) . '/../model/mytable.php';

use app\model\mytable;

class sample extends controller
{
    public function __construct() {
    }

    public function index() {
        $mytable = new mytable();
        // テンプレートにパラメータを渡し、 HTML を生成し返却
        return $this->view($this->name, [
            'titile'    => $this->name,
            'message'   => 'Hello',
            'list'      => $mytable->getAll()
        ]);
    }

    public function post() {
        if(isset($_POST['add'])) {
            $param = filter_input(INPUT_POST, 'name',
            FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $this->logging($param);
            $mytable->insert([
                'name'  => $param
            ]);
        }

        if(isset($_POST['delete'])) {
            $item = filter_input(INPUT_POST, 'item',
            FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);
            $this->logging(implode(',', $item));

            $mytable = new mytable();
            foreach($item as $id => $val) {
                $mytable->delete([
                    'id' => $id
                ]);
            }
        }

        return $this->view($this->name, [
            'title'    => $this->name,
            'message'  => 'Hello',
            'list'     => $mytable->getAll()
        ]);
    }
}