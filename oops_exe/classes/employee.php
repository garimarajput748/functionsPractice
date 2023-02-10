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
        if (empty($fname)) return "Please enter first name";
        $this->fname = $fname;
    }

    public function setlname($lname)
    {
        if (empty($lname)) return "Please enter last name";
        $this->lname = $lname;
    }
    public function setemail($email)
    {
        if (empty($email)) return "Please enter email";
        $this->email = $email;
    }
    public function setnumber($number)
    {
        if (empty($number)) return "Please enter number";
        $this->number = $number;
    }
    public function setgender($gender)
    {
        if (empty($gender)) return "Please enter gender";
        $this->gender = $gender;
    }
    public function setdob($dob)
    {
        if (empty($dob)) return "Please enter DOB";
        $this->dob = $dob;
    }
    private function err()
    {
        return $this->error;
    }

    public function getemployeedetails()
    {

        if (isset($this->fname, $this->lname, $this->email, $this->number, $this->gender, $this->dob)) {

            $return_arr['Fullname'] = $this->fname.' '.$this->lname;
            $return_arr['Email'] = $this->email;
            $return_arr['Number'] = $this->number;
            $return_arr['Gender'] = $this->gender;
            $return_arr['DOB'] = $this->dob;
            return $return_arr;
        }

        return $this->err();
    }
}
