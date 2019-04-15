<?php
/**
 * Created by PhpStorm.
 * User: ahmed
 * Date: 4/9/19
 * Time: 3:10 PM
 */

namespace PHPMVC\Controllers;
use PHPMVC\LIB\Helper;
use PHPMVC\LIB\InputFilter;
use PHPMVC\Models\Employee;

 class EmployeeController extends AbstractController
 {
     use InputFilter;
     use Helper;
    public function defaultAction()
    {

       $this->_data['result'] = Employee::getAll();
        $this->_view();
    }
     public function addAction()
     {
        if (isset($_POST['submit']))
        {
            $emp = new Employee();
            $emp->name = $this->filterString($_POST['name']);
            $emp->email = $this->filterEmail($_POST['email']);
            $emp->age = $this->filterInt($_POST['age']);
            $emp->address = $this->filterString($_POST['address']);
            $emp->salary = $this->filterFloat($_POST['salary']);
            $emp->tax = $this->filterFloat($_POST['tax']);
            if ($emp->save())
            {
                $_SESSION['message'] = "employees is saved to database";
                $this->redirect('/employee');
            }
        }
         $this->_view();
     }
//     edit data
     public function editAction()
     {
//         to get id
         $id = $this->filterInt($this->_params[0]);
         $emp = Employee::getByPK($id);
         if ($emp === false)
         {
             $this->redirect('/employee');
         }
         $this->_data['employee'] = $emp;

         if (isset($_POST['submit']))
         {
             $emp = new Employee();
             $emp->name = $this->filterString($_POST['name']);
             $emp->email = $this->filterEmail($_POST['email']);
             $emp->age = $this->filterInt($_POST['age']);
             $emp->address = $this->filterString($_POST['address']);
             $emp->salary = $this->filterFloat($_POST['salary']);
             $emp->tax = $this->filterFloat($_POST['tax']);
             if ($emp->save())
             {
                 $_SESSION['message'] = "employees is saved to database";
                 $this->redirect('/employee');
             }
         }
         $this->_view();
     }
//     delete data
     public function deleteAction()
     {
         $id = $this->filterInt($this->_params[0]);
         $emp = Employee::getByPK($id);
         if ($emp === false)
         {
             $this->redirect('/employee');
         }
         if ($emp->delete())
         {
             $_SESSION['message'] = "Employee deleted successfully";
             $this->redirect('/employee');
         }
     }
 }
