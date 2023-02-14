<?php
class Bank {
    protected $accountNumber;
    protected $accountBalance;

    public function setDetails($accountNumber, $accountBalance) {
        if (!isset($accountNumber) && empty($accountNumber)) return "Please select Account Number";
        $this->accountNumber = $accountNumber;

        if (!isset($accountBalance) && empty($accountBalance)) return "Please select Account Balance";
        $this->accountBalance = $accountBalance;
    }

    public function getDetails() {
        if (isset($this->accountNumber) && isset($this->accountBalance)){
            $resultArr['Account Number'] = $this->accountNumber;
            $resultArr['Account Balance'] = $this->accountBalance;
            return $resultArr;
        }
        return "Account details not set";
    }

}

class SavingAccount extends Bank {
    public function addInterest($accountType, $interestRate) {
        
        if (isset($interestRate) && isset($accountType) && ($accountType == "Saving Account")) {
            $resultArr['Account Type'] = $accountType;
            $resultArr['Interest'] = intval($interestRate);
            $resultArr['After Interest Added in Saving Account'] = $this->accountBalance + ($this->accountBalance * $interestRate * 1 / 100);
            $resultArr['Note'] = 'Amount Calulate by 1yr';
            return $resultArr;
        }
    }
}

class CurrentAccount extends Bank {
    public function addInterest($accountType, $interestRate){

        if (isset($interestRate) && isset($accountType) && ($accountType == "Current Account")){
            $resultArr['Account Type'] = $accountType;
            $resultArr['Interest'] = intval($interestRate);
            $resultArr['After Interest Added in Current Account'] = $this->accountBalance + ($this->accountBalance * ($interestRate/2) * 1 / 100);
            $resultArr['Note'] = 'Amount Calulate by 1yr';
            return $resultArr;
        }
    }
}
