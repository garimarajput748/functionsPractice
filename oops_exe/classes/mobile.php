<?php 
class Mobile {
    private $brand;
    private $size;
    private $ram;
    private $processor;
    private $price;

    function  __construct($brand,$size,$ram,$processor){
        if (empty($brand)) return "Please select brand name";
        $this->brand = $brand;
        if (empty($size)) return "Please enter size";
        $this->size = $size;
        if (empty($ram)) return "Please select ram";
        $this->ram = $ram;
        if (empty($processor)) return "Please select processor";
        $this->processor = $processor;
    }

    public function setprice()
    {
        $priceArr = array("Vivo" => 5000 , "Samsung"=>7000, "One+" =>8000, "Oppo"=>6000);
        if (array_key_exists($this->brand,$priceArr)){
            $this->price = $priceArr[$this->brand];
        }
    }

    public function getprice() 
    {
        if (isset($this->brand, $this->size, $this->ram, $this->processor)) {
            $return_arr['Brand'] = $this->brand;
            $return_arr['Screen Size'] = $this->size;
            $return_arr['Ram'] = $this->ram;
            $return_arr['Processor'] = $this->processor."<hr>";
            $return_arr['Total Price'] = $this->price*($this->size/4.0)+$this->price*($this->ram/1.0)+$this->price*($this->processor/1.0)+0.05*$this->price;
            return $return_arr;
        }
    }
}