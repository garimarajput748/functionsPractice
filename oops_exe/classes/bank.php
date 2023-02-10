<?php 
class Bank {
    private $accountNumber;
    protected $accountBalance;

    public function setDetails($accountNumber, $accountBalance){
        if (empty($accountNumber)) return "Please select Account Number";
        $this->accountNumber = $accountNumber;

        if (empty($accountBalance)) return "Please select Account Number";
        $this->accountBalance = $accountBalance;
    }

    public function getDetails(){
        if (isset($this->accountNumber) && isset($this->accountBalance)){
            $resultArr['Account Number'] = $this->accountNumber;
            $resultArr['Account Balance'] = $this->accountBalance;
            return $resultArr;
        }
        return "Account details not set";
    }

}

class savingAccount extends Bank{
    private $accountType;
    private $interestRate;
    
    public function addInterest($accountType,$interestRate){
        if(isset($interestRate) && !empty($interestRate) && !empty($accountType)){

            $resultArr['Account Type'] = $this->accountType;
            $resultArr['Interest'] = $this->interestRate;
            $resultArr['After Interest Added'] = $this->accountBalance + $this->interestRate;
            return $resultArr;

        }
        return "Interest and Account type details not set";
        
    }
}
