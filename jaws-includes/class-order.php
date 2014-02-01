<?php
    class Order {
        public $OrderId;
        public $SSNr;
        public $OrderDate;
        public $Discount;
        public $ChargedCard;
        public $OrderIP;
        public $OrderList;
        public $OrderPrice;

        public function __construct($OrderId,$SSNr,$OrderDate,$Discount,$ChargedCard,$OrderIP,$OrderList) {
            $this->OrderId      = $OrderId;
            $this->SSNr         = $SSNr;
            $this->OrderDate    = $OrderDate;
            $this->Discount     = $Discount;
            $this->ChargedCard  = $ChargedCard;
            $this->OrderIP      = $OrderIP;
            $this->OrderPrice   = 0;
            if($OrderList==NULL){
                $this->OrderList = NULL;
            }else{
                for($i=0;$i<count($OrderList);$i++){
                    $this->OrderList[$i]=new ListedProduct($OrderList[$i]['OrderId'],$OrderList[$i]['ProductId'],$OrderList[$i]['Amount']);
                }
            }
            for($i=0;$i<count($OrderList);$i++){
                $this->OrderPrice   += $this->OrderList[$i]->ProductPriceTotal;
            }
        }
    }

    class ListedProduct {
        public $OrderId;
        public $ProductId;
        public $ProductWeight;
        public $ProductPrice;
        public $Amount;
        public $Name;
        public $ProductPriceTotal;

        public function __construct($OrderId,$ProductId,$Amount) {
            $this->OrderId      = $OrderId;
            $this->ProductId    = $ProductId;
            $this->Amount       = $Amount;
            global $db;
            $ProductInfo=$db->dbGetProduct($this->ProductId);
            $this->ProductWeight= $ProductInfo['ProductWeight'];
            $this->ProductPrice = $ProductInfo['Price'];
            $this->Name         = $ProductInfo['Name'];
            $this->ProductPriceTotal = $Amount*$this->ProductPrice;
        }
    }

?>