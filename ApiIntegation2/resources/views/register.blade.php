<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        #main {}
    </style>
</head>

<body>
    <div id="main" align="center">
        <h2><u>Register Form</u></h2>
        <div id="form">
            <form id="reg-form">
                <table>
                    <tr>
                        <td>Name</td>
                        <td><input type="text" name="name" placeholder="Enter Name"></td>
                        <td><span class="err name_err"></span></td>
                    </tr>
                    <tr></tr>
                    <tr>
                        <td>Email</td>
                        <td><input type="email" name="email" placeholder="Enter Email"></td>
                        <td><span class="err email_err"></span></td>
                    </tr>
                    <tr></tr>
                    <tr>
                        <td>Password</td>
                        <td><input type="password" name="password" placeholder="Enter Password"></td>
                        <td><span class="err password_err"></span></td>
                    </tr>
                    <tr></tr>
                    <tr>
                        <td>Confirm Password</td>
                        <td><input type="password" name="confirm_password" placeholder="Enter Confirm Password"></td>
                        <td><span class="err password_confirmation_err"></span></td>
                    </tr>
                    <tr></tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" name="submit" value="SUBMIT"></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#reg-form').submit(function(e){
                e.preventDefault();

                let data = new FormData(this);

                $.ajax({
                    url:"http://127.0.0.1:8000/api/register",
                    type:"POST",
                    data:data,
                    processData:false,
                    contentType:false,
                    success:(data)=>{
                        console.log(data.status);
                        if(data.status){
                            console.log(data);
                        }else if(data.status==false){
                            printErrMsg(data)
                        }
                    },
                    error:(data)=>{
                        console.log(data);
                    }
                });
            });

            function printErrMsg(err){
                $('.err').text("");
                $.each(err,function(index,value){
                    console.log(err.index);
                    $('.'+index+'_err').text(value);
                });
            }
        });
    </script>
</body>

</html>