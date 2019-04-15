<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MVC</title>

    <!--    <link rel="stylesheet" type="text/css" href="../../../public/css/font-awesome.min.css">-->
    <!--    <link rel="stylesheet" type="text/css" href="../../../public/css/style.css">-->
    <style>
        .form-style-1 {
            margin:10px 20px;
            width: 40%;
            padding: 20px 12px 10px 20px;
            font: 13px "Lucida Sans Unicode", "Lucida Grande", sans-serif;
            float:left;
        }
        .form-style-1 li {
            padding: 0;
            display: block;
            list-style: none;
            margin: 10px 0 0 0;
        }
        .form-style-1 label{
            margin:0 0 3px 0;
            padding:0px;
            display:block;
            font-weight: bold;
        }
        .form-style-1 input[type=text],
        .form-style-1 input[type=date],
        .form-style-1 input[type=datetime],
        .form-style-1 input[type=number],
        .form-style-1 input[type=search],
        .form-style-1 input[type=time],
        .form-style-1 input[type=url],
        .form-style-1 input[type=email],
        textarea,
        select{
            box-sizing: border-box;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            border:1px solid #BEBEBE;
            padding: 7px;
            margin:0px;
            -webkit-transition: all 0.30s ease-in-out;
            -moz-transition: all 0.30s ease-in-out;
            -ms-transition: all 0.30s ease-in-out;
            -o-transition: all 0.30s ease-in-out;
            outline: none;
        }
        .form-style-1 input[type=text]:focus,
        .form-style-1 input[type=date]:focus,
        .form-style-1 input[type=datetime]:focus,
        .form-style-1 input[type=number]:focus,
        .form-style-1 input[type=search]:focus,
        .form-style-1 input[type=time]:focus,
        .form-style-1 input[type=url]:focus,
        .form-style-1 input[type=email]:focus,
        .form-style-1 textarea:focus,
        .form-style-1 select:focus{
            -moz-box-shadow: 0 0 8px #88D5E9;
            -webkit-box-shadow: 0 0 8px #88D5E9;
            box-shadow: 0 0 8px #88D5E9;
            border: 1px solid #88D5E9;
        }


        .form-style-1 .field-long{
            width: 100%;
        }
        .form-style-1 .field-select{
            width: 100%;
        }
        .form-style-1 .field-textarea{
            height: 100px;
        }
        .form-style-1 input[type=submit], .form-style-1 input[type=button]{
            background: #4B99AD;
            padding: 8px 15px 8px 15px;
            border: none;
            color: #fff;
        }
        .form-style-1 input[type=submit]:hover, .form-style-1 input[type=button]:hover{
            background: #4691A4;
            box-shadow:none;
            -moz-box-shadow:none;
            -webkit-box-shadow:none;
        }
        .form-style-1 .required{
            color:red;
        }
        form .message
        {
            color: blue;
        }
        form .error
        {
            color: red;
        }
    </style>

</head>
<body>
<form method="POST">
    <?php if(isset($_SESSION['message'])) :?>
        <p class="message <?=isset($error) ? 'error' : ''?>"><?=$_SESSION['message']?>
        </p>
        <?php unset($_SESSION['message'])?>
    <?php endif; ?>
    <ul class="form-style-1">
        <li><label>Employee Name <span class="required">*</span></label>
            <input type="text" id="name" name="name" class="field-long"
                   value="<?=isset($employee) ? $employee->name : ''?>" />
        </li>
        <li>
            <label>Employee Email <span class="required">*</span></label>
            <input type="email" id="email" name="email" class="field-long"
                   value="<?=isset($employee) ? $employee->email : ''?>" />
        </li>
        <li>
            <label>Employee Age<span class="required">*</span></label>
            <input type="number" id="age" name="age" class="field-long"
                   value="<?=isset($employee) ? $employee->age : ''?>"/>
        </li>
        <li>
            <label>Your Address<span class="required">*</span></label>
            <input type="text" id="address" name="address"
                   class="field-long" value="<?=isset($employee) ? $employee->address : ''?>" />
        </li>
        <li>
            <label>Salary<span class="required">*</span></label>
            <input type="number" id="salary" name="salary" class="field-long"
                   value="<?=isset($employee) ? $employee->salary : ''?>" />
        </li>
        <li>
            <label>Tax<span class="required">*</span></label>
            <input type="number" id="tax" name="tax" step="0.01" min="1"
                   max="5" class="field-long"
                   value="<?=isset($employee) ? $employee->tax : ''?>"/>
        </li>
        <li>
            <input type="submit" value="Submit" name="submit"/>
        </li>
    </ul>
</form>


</body>
</html>