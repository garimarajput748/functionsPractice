<?php
class Employee
{

    private $fname;
    private $lname;
    private $email;
    private $number;
    private $gender;
    private $dob;
    private $error = "Please fill all fields";

    public function setfName($fname)
    {
        if (empty($fname)) return "Please enter valid value";
        $this->fname = $fname;
    }

    public function setlname($lname)
    {
        $this->lname = $lname;
    }
    public function setemail($email)
    {
        $this->email = $email;
    }
    public function setnumber($number)
    {
        $this->number = $number;
    }
    public function setgender($gender)
    {
        $this->gender = $gender;
    }
    public function setdob($dob)
    {
        $this->dob = $dob;
    }
    private function err()
    {
        return $this->error;
    }

    public function getemployeedetails()
    {

        if (isset($this->fname, $this->lname, $this->email, $this->number, $this->gender, $this->dob)) {

            $return_arr['Name'] = $this->fname;
            $return_arr['Email'] = $this->email;
            $return_arr['DOB'] = $this->dob;
            return $return_arr;
        }

        return $this->err();
    }
}
