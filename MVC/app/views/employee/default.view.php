<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MVC</title>
    
<!--    <link rel="stylesheet" type="text/css" href="../../../public/css/font-awesome.min.css">-->
<!--    <link rel="stylesheet" type="text/css" href="../../../public/css/style.css">-->
    <style>
        /*table to show employees*/
        .employee
        {
            margin: 10px 20px;
            font: 13px "Lucida Sans Unicode", "Lucida Grande", sans-serif;
            width:100%;

            overflow: hidden;
            padding: 20px 12px 10px 20px;
        }
        .employee table {
            /*border-collapse: collapse;*/
            padding: 20px 12px 10px 20px;
        }

        table th, td {
            /*border: 1px solid black;*/
            border-bottom: 1px solid #ddd;
            padding: 20px 12px 10px 20px;
            font-size: 15px;
        }
    </style>

</head>
<body>
<div>

    <div class="employee">
        <a href="/employee/add">Add New Employee</a>
        <table>
            <thead>
            <tr>
                <th>Name</th>
                <th>Address</th>
                <th>Age</th>
                <th>Tax</th>
                <th>Salary</th>
                <th>Salary After Tax</th>
                <th>control</th>
            </tr>
            </thead>
            @@foreach $result as $value

            @@end
            <?php if(isset($_SESSION['message'])) :?>
                <p class="message <?=isset($error) ? 'error' : ''?>"><?=$_SESSION['message']?>
                </p>
                <?php unset($_SESSION['message'])?>
            <?php endif; ?>
            <tbody>
            <?php if(false !== $result):?>
                <?php foreach ($result as $value) :?>
                    <tr>
                        <td><?=$value->name?></td>
                        <td><?=$value->address?></td>
                        <td><?=$value->age?></td>
                        <td><?=$value->tax?></td>
                        <td><?=round($value->salary)?></td>
                        <td><?=$value->calculateSalary()?></td>
                        <td>
                            <a href="http://www.mvcapp.com/employee/edit/<?=$value->id?>">
                                Edit</a>
                            <a href="http://www.mvcapp.com/employee/delete/<?=$value->id?>"
                               onclick="if(!confirm('Do you want delete this employee')) return false;">
                                Delete</a>
                        </td>
                    </tr>
                <?php endforeach;?>

            <?php else:?>
                <td colspan="5"><p>Sorry no data in employee table</p></td>
            <?php endif;?>
            </tbody>

        </table>
    </div>
</div>


</body>
</html>