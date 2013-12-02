<?php
    //Includes
    include_once 'db.php';
    include 'config.php';

    //Initialize the class Database
    $db=new Database($dbHost,$dbUser,$dbPassword,$dbName);
    //Functions


    function getOrders() { // Returns an order from the order as an Order class.
        $arg_list=func_get_args();

        //Call function in db.php to get the array of users
        $data=call_user_func_array(array($this->db,"dbGetOrders()"),$arg_list);

        $order=NULL;
        for($i=0;$i<count($data);$i++){
            $order[$i]=new Order($data[$i]['OrderId'],$data[$i]['SSNr'],$data[$i]['OrderDate'],$data[$i]['Discount'],$data[$i]['ChargedCard'],$data[$i]['ProductList']);
        }
        return $order;
    }

    class Order {
        public $OrderId;
        public $SSNr;
        public $OrderDate;
        public $Discount;
        public $ChargedCard;
        public $ProductList;

        public function __construct($OrderId,$SSNr,$OrderDate,$Discount,$ChargedCard,$ProductList) {
            $this->OrderId      = $OrderId;
            $this->SSNr         = $SSNr;
            $this->OrderDate    = $OrderDate;
            $this->Discount     = $Discount;
            $this->ChargedCard  = $ChargedCard;
            $this->ProductList  = NULL;

            for($i=0;$i<count($ProductList);$i++){
                $this->ProductList[$i]=new ListedProduct($ProductList[$i]['OrderId'],$ProductList[$i]['ProductId'],$ProductList[$i]['Amount']);
            }


        }

        public function getOrderId() {
            return $this->OrderId;
        }

        public function getSSNr() {
            return $this->SSNr;
        }

        public function getOrderDate() {
            return $this->OrderDate;
        }

        public function getDiscount() {
            return $this->Discount;
        }

        public function getChargedCard() {
            return $this->ChargedCard;
        }

        public function setChargedCard($NewCard) {
            $this->card = $NewCard;
        }

        public function getProductList() {
            return $this->ProductList;
        }

        public function addProduct($ProductId, $Amount) {
            $this->ProductList[count($this->ProductList)]= new ListedProduct($this->OrderId,$ProductId,$Amount);
        }

        public function removeProduct($ProductId){
            for ($i = 0; $i < count($this->ProductList); $i++){
                if ($this->ProductList[$i]->ProductId == $ProductId) {
                    unset($this->ProductList[$i]);
                    return true;
                }
            }
            return false;
        }

        public function setProductAmount($productId, $amount){
            for ($i = 0; $i < count($this->ProductList); $i++){
                if ($this->ProductList[$i]->ProductId == $productId) {
                    $this->ProductList[$i]->setAmount($amount);
                    return true;
                }
            }
            return false;
        }
    }

    class ListedProduct {
        public $OrderId;
        public $ProductId;
        public $Amount;

        public function __construct($OrderId,$ProductId,$Amount) {
            $this->OrderId      = $OrderId;
            $this->ProductId    = $ProductId;
            $this->Amount       = $Amount;
        }

        public function getOrderId(){
            return $this->OrderId;
        }

        public function getProductId(){
            return $this->ProductId;
        }

        public function getAmount(){
            return $this->Amount;
        }

        public function setAmount($Amount){
            $this->Amount = $Amount;
        }
    }

?>